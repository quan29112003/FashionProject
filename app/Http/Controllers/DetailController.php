<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Cart;

class DetailController extends Controller
{
    public function showDetail($id, $name)
    {
        $product = Product::with(['images', 'category', 'variants.color', 'variants.size'])->findOrFail($id);

        $expectedName = str_replace(' ', '-', strtolower($product->name_product));
        if ($expectedName !== $name) {
            return redirect()->route('detail', ['id' => $id, 'name' => $expectedName]);
        }

        $variant = $product->variants->first();
        $price = $variant ? $variant->price : $product->price;
        $price_sale = $variant ? $variant->price_sale : null;

        $images = $product->images;

        $category = $product->category->name;

        $variants = $product->variants;

        $colors = $variants->pluck('color')->unique();
        $sizes = $variants->pluck('size')->unique();

        $selectedColorId = $variants->first() ? $variants->first()->color->id : null;
        $selectedSizeId = $variants->first() ? $variants->first()->size->id : null;

        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->has('variants')
            ->get()
            ->map(function ($relatedProduct) {
                $variant = $relatedProduct->variants->first();
                $relatedProduct->price = $variant ? $variant->price : $relatedProduct->price;
                $relatedProduct->price_sale = $variant ? $variant->price_sale : null;
                return $relatedProduct;
            });

        $newProducts = $relatedProducts->filter(function ($product) {
            return $product->created_at->greaterThan(now()->subDays(5));
        });

        return view('client.layouts.detail', compact('product', 'newProducts', 'variant', 'price', 'price_sale', 'images', 'category', 'variants', 'colors', 'sizes', 'relatedProducts', 'selectedColorId', 'selectedSizeId'));
    }

    public function getProductPrice(Request $request)
    {
        $productId = $request->query('product_id');
        $colorId = $request->query('color');
        $sizeId = $request->query('size');

        $variant = ProductVariant::where('product_id', $productId)
            ->where('color_id', $colorId)
            ->where('size_id', $sizeId)
            ->first();

        if ($variant) {
            return response()->json(['price' => $variant->price, 'price_sale' => $variant->price_sale]);
        } else {
            return response()->json(['error' => 'Invalid variant selected.'], 404);
        }
    }
    public function getVariantId(Request $request)
    {
        $product_id = $request->input('product_id');
        $color_id = $request->input('color_id');
        $size_id = $request->input('size_id');

        $variant = ProductVariant::where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->where('size_id', $size_id)
            ->first();

        if ($variant) {
            return response()->json(['variant_id' => $variant->id]);
        } else {
            return response()->json(['error' => 'Variant not found'], 404);
        }
    }
    public function getVariantQuantity(Request $request)
{
    $productId = $request->query('product_id');
    $colorId = $request->query('color');
    $sizeId = $request->query('size');

    $variant = ProductVariant::where('product_id', $productId)
                      ->where('color_id', $colorId)
                      ->where('size_id', $sizeId)
                      ->first();

    if ($variant) {
        return response()->json(['quantity' => $variant->quantity]);
    } else {
        return response()->json(['quantity' => 0], 404);
    }
}
}
