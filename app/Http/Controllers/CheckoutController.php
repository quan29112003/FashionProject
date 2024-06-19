<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = Cart::where('session_id', session()->getId())->first();
        $cartItems = $cart ? $cart->cartItems : [];
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('client.layouts.checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = Cart::where('session_id', session()->getId())->first();
        $cartItems = $cart ? $cart->cartItems : [];
        $order = Order::create([
            // Không có user_id khi không yêu cầu đăng nhập
            'session_id' => session()->getId(),
            'total' => $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            }),
            'status' => 'completed'
        ]);
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }
        $cart->delete();
        return redirect()->route('orders.index')->with('success', 'Order processed successfully');
    }
}
