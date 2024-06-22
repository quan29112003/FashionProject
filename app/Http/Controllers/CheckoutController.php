<?php

namespace App\Http\Controllers;

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
        ]);

        $order = Order::create([
            'user_id' => 1,
            'status' => 'pending',
            'total_amount' => $request->total_amount,
            'voucher_id' => $request->voucher_id ?? null,
            'add_points' => $request->add_points ?? 0,
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
