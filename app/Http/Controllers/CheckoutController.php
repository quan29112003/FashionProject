<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    // Phương thức hiển thị trang thanh toán
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        return view('client.layouts.checkout', compact('total'));
    }

    // Phương thức xử lý thanh toán
    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'payment_method' => 'required',
        ]);

        // Lưu thông tin order tạm thời vào session
        session()->put('checkout_first_name', $request->first_name);
        session()->put('checkout_last_name', $request->last_name);
        session()->put('checkout_country', $request->country);
        session()->put('checkout_address', $request->address);
        session()->put('checkout_address2', $request->address2);
        session()->put('checkout_city', $request->city);
        session()->put('checkout_state', $request->state);
        session()->put('checkout_postcode', $request->postcode);
        session()->put('checkout_phone', $request->phone);
        session()->put('checkout_email', $request->email);
        session()->put('checkout_note', $request->note);
        session()->put('total_amount', $request->total_amount); // Lưu tổng số tiền vào session

        if ($request->payment_method === 'vnpay') {
            Log::info('Starting VNPAY payment process');
            return $this->createVnpayPayment($request);
        }

        // Xử lý thanh toán khi nhận hàng (COD)
        return $this->createOrder($request, 0);
    }

    // Phương thức tạo thanh toán qua VNPAY
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

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        Log::info('VNPAY URL: ' . $vnp_Url);
        return redirect($vnp_Url);
    }

    // Phương thức xử lý phản hồi từ VNPAY
    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            $inputData[$key] = $value;
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= '&' . $key . "=" . $value;
        }
        $hashData = ltrim($hashData, '&');

        $secureHash = hash('sha256', $vnp_HashSecret . $hashData);

        Log::info('VNPAY Return Data: ', $inputData);
        Log::info('Calculated Secure Hash: ' . $secureHash);
        Log::info('VNPAY Secure Hash: ' . $vnp_SecureHash);

        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                Log::info('VNPAY payment successful, creating order');
                // Thanh toán thành công, lưu thông tin đơn hàng vào database
                $totalAmount = session()->pull('total_amount'); // Lấy tổng số tiền từ session

                return $this->createOrder($request, 1, $totalAmount);
            } else {
                Log::error('VNPAY payment failed with response code: ' . $request->vnp_ResponseCode);
                return redirect('/')->with('error', 'Thanh toán không thành công!');
            }
        } else {
            Log::error('Invalid VNPAY secure hash');
            return redirect('/')->with('error', 'Chữ ký không hợp lệ!');
        }
    }

    // Phương thức tạo đơn hàng
    private function createOrder($request, $paymentMethod, $totalAmount = null)
    {
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => 1,
                'status' => 'pending',
                'payment' => $paymentMethod,
                'total_amount' => $totalAmount ?? $request->total_amount,
                'voucher_id' => session()->get('voucher_id'),
                'add_points' => session()->get('add_points', 0),
                'first_name' => session()->pull('checkout_first_name'),
                'last_name' => session()->pull('checkout_last_name'),
                'country' => session()->pull('checkout_country'),
                'address' => session()->pull('checkout_address'),
                'address2' => session()->pull('checkout_address2'),
                'city' => session()->pull('checkout_city'),
                'state' => session()->pull('checkout_state'),
                'postcode' => session()->pull('checkout_postcode'),
                'phone' => session()->pull('checkout_phone'),
                'email' => session()->pull('checkout_email'),
                'note' => session()->pull('checkout_note'),
            ]);

            foreach (session('cart', []) as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart');
            DB::commit();

            Log::info('Order created successfully: ', ['order_id' => $order->id]);

            return redirect('/')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }
}
