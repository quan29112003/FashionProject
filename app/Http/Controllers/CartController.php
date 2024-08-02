<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        return view('client.layouts.cart', compact('cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);

        // Lấy thông tin sản phẩm và biến thể
        $product = Product::find($productId);
        $variant = ProductVariant::find($variantId);

        if (!$product || !$variant) {
            return response()->json(['success' => false, 'message' => 'Invalid product or variant']);
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
                'image' => $product->thumbnail, // Cập nhật thumbnail từ product
                'size' => $variant->size->size ?? '', // Cập nhật size từ variant
                'color' => $variant->color->color ?? '', // Cập nhật color từ variant
                'color_code' => $variant->color->color_code ?? '', // Cập nhật color_code từ variant
            ];
        }

        // Lưu lại giỏ hàng vào session
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }


    public function updateQuantity(Request $request)
    {
        Log::info('Received AJAX request', $request->all());  // Log the received request data

        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        $itemTotal = 0;
        $cartTotal = 0;

        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId && $item['variant_id'] == $variantId) {
                $cart[$key]['quantity'] = $quantity;
                $itemTotal = $cart[$key]['price'] * $cart[$key]['quantity'];
                Log::info('Updated item', $cart[$key]);  // Log the updated item
            }
            $cartTotal += $cart[$key]['price'] * $cart[$key]['quantity'];
        }

        session()->put('cart', $cart);

        Log::info('Updated cart', $cart);  // Log the updated cart

        return response()->json([
            'success' => true,
            'item_total' => $itemTotal,
            'cart_total' => $cartTotal
        ]);
    }








    public function removeFromCart(Request $request)
    {
        // dd('Received request:', $request->all());
        $productId = $request->input('product_id');
        $variantId = $request->input('variant_id');
        $cart = session()->get('cart', []);


        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId && $item['variant_id'] == $variantId) {
                unset($cart[$key]);
                break;
            }
        }

        // Đảm bảo các chỉ số của mảng là liên tục
        $cart = array_values($cart);

        if (empty($cart)) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }







    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully');
    }
}
