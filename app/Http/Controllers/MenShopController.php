<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class MenShopController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();


        $query = Product::with('variants', 'images');

        // Apply sorting
        switch ($request->get('sort_by')) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy('name_product', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name_product', 'desc');
                break;
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = (float)$request->input('min_price');
            $maxPrice = (float)$request->input('max_price');

            $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                $q->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            });
        }

        // Get products with their first variant based on some criteria
        $products = $query->with(['variants' => function ($query) {
            $query->orderBy('price'); // Assuming you want to order variants by price
        }, 'images'])->has('variants')
            ->where([['is_active', 1],['gender_id',1]]) // Chỉ lấy sản phẩm có is_active = 1
            ->get()
            ->map(function ($product) {
                // Attach the first variant to the product (if exists)
                $product->variant = $product->variants->first();
                // Clear the variants collection to only include the selected one
                $product->setRelation('variants', collect([$product->variant]));
                return $product;
            });
        $variantProducts = collect();
        foreach ($products as $product) {
            $variantProducts[$product->id] = $product->variants;
        }

        return view('client.layouts.mens', compact('categories', 'sizes', 'colors', 'products','variantProducts'));
    }

}
