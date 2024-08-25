<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ProductVariant;
use App\Models\Voucher;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        $vouchers = Voucher::with('category', 'products')->get();

        return view('client.layouts.checkout', compact('total', 'vouchers'));
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
        session()->put('checkout_name', $request->name);
        session()->put('checkout_address', $request->address);
        session()->put('checkout_state', $request->state);
        session()->put('checkout_postcode', $request->postcode);
        session()->put('checkout_phone', $request->phone);
        session()->put('checkout_email', $request->email);
        session()->put('checkout_note', $request->note);
        session()->put('checkout_voucher_id', $request->voucher_id);
        session()->put('total_amount', $request->total_amount);

        $order = $this->createOrder($request, 1);

        if (!$order instanceof Order) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo đơn hàng.');
        }

        session()->put('order_id', $order->id);
        session()->put('success_order', $order);

        if ($request->payment_method === 'vnpay') {
            Log::info('Starting VNPAY payment process');
            session()->put('order_id', $order->id);
            return $this->createVnpayPayment($request);
        }

        Log::info('Before status_id update');
        $order->status_id = 2;
        $order->save();
        Log::info('After status_id update');

        $this->sendOrderConfirmationEmail($order);

        return redirect('/')->with('success', 'Đặt hàng thành công!');
    }

    private function sendOrderConfirmationEmail(Order $order)
    {
        if (is_null($order->user_id)) {
            Log::info('Preparing to send email to ' . $order->email);

            $order = $order->load('orderItems');

            Mail::send('emails.order_confirmation', ['order' => $order], function ($message) use ($order) {
                $message->to($order->email)
                    ->subject('Xác nhận đơn hàng')
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });

            Log::info('Email sent to ' . $order->email);
        }
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
                Log::info('VNPAY payment successful, updating order status');
                $orderId = session()->pull('order_id');
                $order = Order::find($orderId);
                $order->status_id = 2;
                $order->payment_id = 2;
                $order->save();

                session()->put('success_order', $order);

                $this->sendOrderConfirmationEmail($order);

                return redirect('/')->with('success', 'Thanh toán thành công!');
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
                'user_id' => auth()->check() ? auth()->user()->id : null,
                'status_id' => 1,
                'payment_id' => 1,
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
                if (!isset($item['name']) || empty($item['name'])) {
                    Log::error('Missing name_product in cart item: ', $item);
                    $item['name'] = 'Unnamed Product';
                }
                if (!isset($item['image']) || empty($item['image'])) {
                    Log::warning('Missing thumbnail in cart item: ', $item);
                }

                try {
                    $productVariant = ProductVariant::where('id', $item['variant_id'])
                        ->lockForUpdate()
                        ->first();

                    if ($productVariant) {
                        if ($productVariant->quantity < $item['quantity']) {
                            throw new \Exception('Số lượng sản phẩm không đủ.');
                        }
                        $productVariant->quantity -= $item['quantity'];
                        $productVariant->save();

                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'name_product' => $item['name'],
                            'thumbnail' => $item['image'] ?? '',
                            'quantity' => $item['quantity'],
                            'size' => $item['size'] ?? '',
                            'color' => $item['color'] ?? '',
                            'color_code' => $item['color_code'] ?? '',
                            'price' => $item['price'],
                        ]);
                    } else {
                        throw new \Exception('Không tìm thấy sản phẩm.');
                    }
                } catch (\Exception $e) {
                    Log::error('Error inserting order item or updating product quantity: ' . $e->getMessage());
                    DB::rollback();
                    return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
                }
            }

            DB::commit();
            session()->forget('cart');
            Log::info('Order created successfully: ', ['order_id' => $order->id]);
            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }
}
