<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Sử dụng session_id() thay cho user_id
        $cart = Cart::firstOrCreate(['session_id' => session()->getId()]);
        if (!$request->has('variant_id')) {
            return redirect()->back()->with('error', 'Variant is required');
        }
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $request->product_id, 'variant_id' => $request->variant_id],
            ['quantity' => $request->quantity]
        );
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function viewCart()
    {
        $cart = Cart::where('session_id', session()->getId())->first();
        $cartItems = $cart ? $cart->cartItems : [];
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('client.layouts.cart', compact('cartItems', 'total'));
    }

    public function removeItem($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->route('cart.view')->with('success', 'Product removed from cart');
    }
}
