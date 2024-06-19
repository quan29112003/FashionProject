<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductColor;
use App\Models\ProductSize;

class DetailController extends Controller
{
    public function showDetail($id)
    {
        // Fetch the product details using Eloquent ORM
        $product = Product::with(['images', 'category', 'variants.color', 'variants.size'])->findOrFail($id);

        // Get the first variant for price and price_sale
        $variant = $product->variants->first();
        $price = $variant ? $variant->price : $product->price;
        $price_sale = $variant ? $variant->price_sale : null;

        // Get the product images
        $images = $product->images;

        // Get the category name
        $category = $product->category->name;

        // Get all variants of the product
        $variants = $product->variants;

        // Extract unique colors and sizes from variants
        $colors = $variants->pluck('color')->unique();
        $sizes = $variants->pluck('size')->unique();

        // Get related products by the same category, excluding the current product
        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->get()
            ->map(function ($relatedProduct) {
                $variant = $relatedProduct->variants->first();
                $relatedProduct->price = $variant ? $variant->price : $relatedProduct->price;
                $relatedProduct->price_sale = $variant ? $variant->price_sale : null;
                return $relatedProduct;
            });

        // Return the product detail view with the necessary data
        return view('client.layouts.detail', compact('product', 'price', 'price_sale', 'images', 'category', 'variants', 'colors', 'sizes', 'relatedProducts'));
    }
}
