<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);

        // Lấy thông tin sản phẩm và biến thể
        $product = Product::find($productId);
        $variant = ProductVariant::find($variantId);

        if (!$product || !$variant) {
            return redirect()->back()->with('error', 'Invalid product or variant');
        }

        // Lấy giỏ hàng từ session, nếu không tồn tại thì khởi tạo mảng rỗng
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        $exists = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $productId && $item['variant_id'] == $variantId) {
                $item['quantity'] += $quantity;
                $exists = true;
                break;
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        if (!$exists) {
            $cart[] = [
                'product_id' => $productId,
                'variant_id' => $variantId,
                'quantity' => $quantity,
                'price' => $variant->price,
                'name' => $product->name_product,
                'image' => $product->images->first()->url ?? null,
            ];
        }

        // Lưu lại giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->input('cart') as $key => $cartItem) {
            if (isset($cart[$key])) {
                $cart[$key]['quantity'] = $cartItem['quantity'];
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');
        $cart = session()->get('cart', []);

        Log::info('Received request to remove product', ['product_id' => $productId, 'variant_id' => $variantId]);
        Log::info('Current cart contents', $cart);

        foreach ($cart as $key => $item) {
            Log::info('Checking item', $item);
            if ($item['product_id'] == $productId && $item['variant_id'] == $variantId) {
                Log::info('Removing item', $item);
                unset($cart[$key]);
                break;
            }
        }

        $cart = array_values($cart);

        if (empty($cart)) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        Log::info('Updated cart contents', $cart);

        return redirect()->back()->with('success', 'Product removed from cart');
    }


    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully');
    }
}
