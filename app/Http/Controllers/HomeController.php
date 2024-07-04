<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;

class HomeController extends Controller
{

    public function index()
    {

        $products = Product::with(['variants', 'images', 'category'])
            ->where('is_show_home', 1) // Chỉ lấy sản phẩm có is_show_home = 1
            ->where('is_active', 1) // Chỉ lấy sản phẩm có is_active = 1
            ->has('variants')
            ->get();

        // Attach the first variant to each product
        $products->each(function ($product) {
            // Order variants by price and attach the first one (you can adjust the criteria)
            $product->variant = $product->variants()->orderBy('price')->first();
            // Clear the variants collection to only include the selected one
            $product->setRelation('variants', collect([$product->variant]));
        });

        // Fetch Hot Trend products
        $hotTrendProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_hot', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $hotTrendProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        // Fetch Best Seller products
        $bestSellerProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_good_deal', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $bestSellerProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });

        // Fetch Feature products
        $featureProducts = Product::with(['variants', 'images', 'category'])
            ->where('is_good_deal', 1)
            ->has('variants')
            ->take(3)
            ->get();

        $featureProducts->each(function ($product) {
            $product->variant = $product->variants()->orderBy('price')->first();
            $product->setRelation('variants', collect([$product->variant]));
        });



        return view('client.layouts.home', compact('products', 'hotTrendProducts', 'bestSellerProducts', 'featureProducts'));
    }
}
