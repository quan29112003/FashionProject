<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function showByCart($cartId)
    {
        $cartItems = CartItem::where('cartID', $cartId)->with('variant.product.image')->get();

        return response()->json($cartItems);
    }
}
