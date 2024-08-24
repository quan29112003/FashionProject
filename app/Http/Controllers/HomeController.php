<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;

class HomeController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::with(['products.variants', 'products.images', 'products.category', 'products' => function($query) {
            $query->where('is_show_home', 1)
                  ->where('is_active', 1)
                  ->has('variants')
                  ->orderBy('created_at', 'desc')
                  ->orderBy('is_good_deal', 'desc');
        }])->whereNotNull('image')->get();

        $product_options = Product::with(['variants', 'images', 'category'])
            ->where('is_show_home', 1)
            ->where('is_active', 1)
            ->has('variants')
            ->orderBy('created_at', 'desc')
            ->orderBy('is_good_deal', 'desc')
            ->get();

        $newProducts = $product_options->filter(function ($product) {
            return $product->created_at->greaterThan(now()->subDays(5));
        });

        $variantProducts = collect();
        foreach ($product_options as $product) {
            $variantProducts[$product->id] = $product->variants;
        }

        $product_options->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        $hotTrendProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_hot', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $hotTrendProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        $bestSellerProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_good_deal', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $bestSellerProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        $featureProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_good_deal', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $featureProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        $categories = Category::all();

        return view('client.layouts.home', compact('product_options', 'newProducts', 'hotTrendProducts', 'bestSellerProducts', 'featureProducts', 'variantProducts', 'categories', 'catalogues'));
    }
}
