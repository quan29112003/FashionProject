<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;;
use App\Models\Category;

class SearchController extends Controller
{

    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    // Fetch available sizes and colors
    $sizes = ProductSize::all();
    $colors = ProductColor::all();
    $categories = Category::all();

    $query = Product::with(['variants.color', 'variants.size', 'images', 'category']);

    // Apply keyword filter
    if ($keyword) {
        $query->where('name_product', 'LIKE', "%{$keyword}%");
    }

    // Apply price filter
    if ($request->has('min_price') && $request->has('max_price')) {
        $minPrice = (float)$request->input('min_price');
        $maxPrice = (float)$request->input('max_price');

        $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
            $q->where('price', '>=', $minPrice)
              ->where('price', '<=', $maxPrice);
        });
    }

    // Apply color and size filters
    if ($request->has('colors') || $request->has('sizes')) {
        $query->whereHas('variants', function ($q) use ($request) {
            $colors = $request->get('colors');
            $sizes = $request->get('sizes');

            if ($colors) {
                $q->whereHas('color', function ($colorQuery) use ($colors) {
                    $colorQuery->whereIn('color', explode(',', $colors));
                });
            }

            if ($sizes) {
                $q->whereHas('size', function ($sizeQuery) use ($sizes) {
                    $sizeQuery->whereIn('size', explode(',', $sizes));
                });
            }
        });
    }

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
        default:
            $query->orderBy('created_at', 'desc'); // Default sorting by newest
            break;
    }

    // Get products with their first variant based on some criteria
    $products = $query->where('is_active', 1)
        ->has('variants')
        ->get()
        ->map(function ($product) {
            // Attach the first variant to the product (if exists)
            $product->variant = $product->variants->first();
            // Clear the variants collection to only include the selected one
            $product->setRelation('variants', collect([$product->variant]));
            return $product;
        });

    $searchResultsHtml = view('client.layouts.search', compact('products', 'keyword', 'categories', 'sizes', 'colors'))->render();

    return $searchResultsHtml;
}


    

    
    private function getProductsByCondition($field, $value)
    {
        $products = Product::with(['variants', 'images', 'category'])
            ->where($field, $value)
            ->take(3)
            ->get();

        $products->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        return $products;
    }
}
