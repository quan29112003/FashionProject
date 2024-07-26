<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('client.layouts.checkout', compact('total'));
    }

    public function processCheckout(Request $request)
    {
        // Validate form data
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
            'voucher_code' => 'nullable|string',
        ]);

        // Xử lý mã giảm giá
        $totalAmount = $request->total_amount;
        $voucherCode = $request->input('voucher_code');
        $voucher = Voucher::where('code', $voucherCode)->first();

        if ($voucher) {
            $discount = $voucher->discount_value;
            $totalAmount -= $totalAmount * ($discount / 100);
        }

        $order = Order::create([
            'user_id' => 1,
            'status' => 'Đang hoạt động',
            'payment' => 0,
            'total_amount' => $totalAmount,
            'voucher_id' => $voucher->id ?? null,
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

        // Xóa giỏ hàng sau khi đặt hàng thành công
        session()->forget('cart');

        // Chuyển hướng về trang chủ với thông báo thành công
        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
