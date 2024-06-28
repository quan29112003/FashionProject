<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     // Lấy danh sách sản phẩm có tên chứa từ khóa
    //     $products = Product::where('name_product', 'like', '%' . $keyword . '%')->get();

    //     return view('client.partials.search_results', compact('products'));
    // }


    public function search(Request $request)
{
    // Lấy từ khóa tìm kiếm từ request
    $keyword = $request->input('keyword');

    // Tìm kiếm sản phẩm dựa trên tên sản phẩm chứa từ khóa
    if($keyword != '' && $keyword != null){
        $products = Product::with(['variants', 'images'])
        ->where('name_product', 'LIKE', "%{$keyword}%")
        ->get();
    }
    $products = [];

    // Fetch Hot Trend products
    $hotTrendProducts = Product::with(['variants', 'images', 'category'])
        ->where('is_hot', 1)
        ->take(3)
        ->get();

    $hotTrendProducts->each(function ($product) {
        $product->variant = $product->variants()->orderBy('price')->first();
        $product->setRelation('variants', collect([$product->variant]));
    });

    // Fetch Best Seller products
    $bestSellerProducts = Product::with(['variants', 'images', 'category'])
        ->where('is_good_deal', 1)
        ->take(3)
        ->get();

    $bestSellerProducts->each(function ($product) {
        $product->variant = $product->variants()->orderBy('price')->first();
        $product->setRelation('variants', collect([$product->variant]));
    });

    // Fetch Feature products
    $featureProducts = Product::with(['variants', 'images', 'category'])
        ->where('is_good_deal', 1)
        ->take(3)
        ->get();

    $featureProducts->each(function ($product) {
        $product->variant = $product->variants()->orderBy('price')->first();
        $product->setRelation('variants', collect([$product->variant]));
    });

    // Render view partials.search_results với các sản phẩm tìm được
    $searchResultsHtml = view('client.partials.search_results', compact('products', 'keyword', 'hotTrendProducts', 'bestSellerProducts', 'featureProducts'))->render();

    // Trả về kết quả dưới dạng JSON
    return $searchResultsHtml;
}

}
