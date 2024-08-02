<?php


namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Color;

class CheckoutController extends Controller
{

    // Phương thức để xử lý áp dụng voucher
    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $total = session('total', 0); // Lấy giá trị tổng đơn hàng từ session

        // Kiểm tra mã voucher
        $voucher = Voucher::where('code', $voucherCode)->first();

        if ($voucher) {
            // Kiểm tra ngày hết hạn
            $currentDate = date('Y-m-d');
            if ($voucher->expiry_date && $voucher->expiry_date < $currentDate) {
                return response()->json(['success' => false, 'message' => 'Mã voucher đã hết hạn.']);
            }

            // Kiểm tra giá trị đơn hàng tối thiểu
            if ($voucher->min_purchase_amount && $total < $voucher->min_purchase_amount) {
                return response()->json(['success' => false, 'message' => 'Tổng giá trị đơn hàng không đạt yêu cầu của mã Voucher.']);
            }

            // Lưu mã voucher vào session
            session(['voucher_code' => $voucherCode, 'voucher_discount' => $voucher->discount_value]);

            $discount = $voucher->discount_value;
            $finalTotal = $total - $discount;

            session(['final_total' => $finalTotal]);

            return response()->json([
                'success' => true,
                'message' => 'Mã voucher được áp dụng thành công.',
                'subtotal' => $total,
                'discount' => $discount,
                'new_total' => $finalTotal
            ]);
        } else {
            // Mã voucher không hợp lệ
            return response()->json(['success' => false, 'message' => 'Mã voucher không hợp lệ.', 'subtotal' => $total]);
        }
    }
    //code cũ
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);
        
        // Xóa giá trị giảm giá và mã voucher khỏi session
        session()->forget(['voucher_code', 'voucher_discount', 'final_total']);

        // Đặt giá trị tổng vào session
        session(['total' => $total]);

        // Khởi tạo các biến để tránh lỗi undefined variable
        $discount = 0;
        $voucherCode = null;
        $finalTotal = $total;

        return view('client.layouts.checkout', compact('total', 'finalTotal', 'discount', 'voucherCode'));
    }
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'payment_method' => 'required',
        ]);

        // Lưu thông tin order tạm thời vào session
        session()->put('checkout_name', $request->name);
        session()->put('checkout_address', $request->address);
        session()->put('checkout_state', $request->state);
        session()->put('checkout_postcode', $request->postcode);
        session()->put('checkout_phone', $request->phone);
        session()->put('checkout_email', $request->email);
        session()->put('checkout_note', $request->note);
        session()->put('checkout_voucher_id', $request->voucher_id);
        session()->put('total_amount', $request->total_amount);

        if ($request->payment_method === 'vnpay') {
            Log::info('Starting VNPAY payment process');
            return $this->createVnpayPayment($request);
        }

        // Xử lý thanh toán khi nhận hàng (COD)
        return $this->createOrder($request, 1);
    }

    private function createVnpayPayment(Request $request)
    {
        $vnp_TmnCode = env('VNP_TMN_CODE');
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $vnp_Url = env('VNP_URL');
        $vnp_Returnurl = route('vnpay_return');
        $vnp_TxnRef = time();
        $vnp_OrderInfo = "Payment for order #{$vnp_TxnRef}";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total_amount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = [];
        foreach ($inputData as $key => $value) {
            $query[] = urlencode($key) . "=" . urlencode($value);
        }
        $hashdata = implode('&', $query);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        $vnp_Url .= "?" . http_build_query($inputData) . '&vnp_SecureHash=' . $vnpSecureHash;

        Log::info('VNPAY Input Data: ' . json_encode($inputData));
        Log::info('VNPAY Secure Hash Data: ' . $hashdata);
        Log::info('VNPAY Calculated Secure Hash: ' . $vnpSecureHash);
        Log::info('VNPAY URL: ' . $vnp_Url);

        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $inputData = $request->all();

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);

        $hashData = [];
        foreach ($inputData as $key => $value) {
            $hashData[] = urlencode($key) . "=" . urlencode($value);
        }
        $hashData = implode('&', $hashData);

        Log::info('Sorted VNPAY Return Data: ', $inputData);
        Log::info('Hash Data String: ' . $hashData);

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        Log::info('Calculated Secure Hash: ' . $secureHash);
        Log::info('VNPAY Secure Hash: ' . $vnp_SecureHash);

        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                Log::info('VNPAY payment successful, creating order');
                $totalAmount = session()->pull('total_amount');
                return $this->createOrder($request, 2, $totalAmount); // Payment method = 2 for online payment
            } else {
                Log::error('VNPAY payment failed with response code: ' . $request->vnp_ResponseCode);
                return redirect('/')->with('error', 'Thanh toán không thành công!');
            }
        } else {
            Log::error('Invalid VNPAY secure hash');
            return redirect('/')->with('error', 'Chữ ký không hợp lệ!');
        }
    }

    private function createOrder($request, $paymentMethod, $totalAmount = null)
    {
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'status_id' => 1, // Mặc định là 1 cho trạng thái "Chờ xác nhận"
                'payment_id' => $paymentMethod, // 1 cho COD, 2 cho thanh toán online
                'total_amount' => $totalAmount ?? $request->total_amount,
                'voucher_id' => session()->get('checkout_voucher_id'),
                'name' => session()->pull('checkout_name'),
                'address' => session()->pull('checkout_address'),
                'state' => session()->pull('checkout_state'),
                'postcode' => session()->pull('checkout_postcode'),
                'phone' => session()->pull('checkout_phone'),
                'email' => session()->pull('checkout_email'),
                'note' => session()->pull('checkout_note'),
            ]);

            $cart = session('cart', []);
            Log::info('Cart data before order creation: ', $cart);

            foreach ($cart as $item) {
                // Kiểm tra và log nếu thiếu trường name_product
                if (!isset($item['name']) || empty($item['name'])) {
                    Log::error('Missing name_product in cart item: ', $item);
                    $item['name'] = 'Unnamed Product'; // Gán giá trị mặc định
                }



                try {
                    // Chèn dữ liệu vào bảng order_items
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'name_product' => $item['name'], // Đảm bảo cột này được điền
                        'thumbnail' => $item['image'] ?? '', // Đảm bảo cột này được điền
                        'quantity' => $item['quantity'],
                        'size' => $item['size'] ?? '',  // Đảm bảo cột này được điền
                        'color' => $item['color'] ?? '', // Đảm bảo cột này được điền
                        'color_code' => $item['color_code'] ?? '', // Đảm bảo cột này được điền
                        'price' => $item['price'],
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error inserting order item: ' . $e->getMessage());
                    DB::rollback();
                    return redirect()->back()->with('error', 'Error inserting order item.');
                }
            }

            session()->forget('cart');
            DB::commit();

            Log::info('Order created successfully: ', ['order_id' => $order->id]);

            return redirect('/')->with('success', 'Đặt hàng thành công!');
            // return redirect()->back()->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }
}
