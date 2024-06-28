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
    $size = $request->input('size');
    $price = $request->input('price');
    $color = $request->input('color');

    // Tìm kiếm sản phẩm dựa trên tên sản phẩm chứa từ khóa
    if($keyword != '' && $keyword != null){
        $products = Product::with(['variants', 'images'])
        ->where('name_product', 'LIKE', "%{$keyword}%")
        ->get();
    }else{
        $products = Product::with(['variants', 'category', 'images'])->get()->toArray();
    }

    foreach ($products as &$product) {
        $product['rating'] = 5;
        if($product['variants']){
            foreach ($product['variants'] as $variant) {
                if($variant){
                    $product['price'] = $variant['price'];
                    $product['color'] = $variant['color_id'];
                    $product['size'] = $variant['size_id'];
                }
            }
        }else{
            $product['price'] = null;
            $product['color'] = null;
            $product['size'] = null;
        }

        if($product['images']){
            $product['image'] = $product['images'][0]['url'];
        }else{
            $product['image'] = null;
        }

    }

    if($price != ""){
        $products = array_filter($products, function ($item) use($price) {
            if($price == 1){
                return (float)$item['price'] >= 100 && (float)$item['price'] < 300;
            }
            if($price == 3){
                return (float)$item['price'] >= 300 && (float)$item['price'] < 500;
            }
            if($price == 4){
                return (float)$item['price'] >= 500;
            }
        });
    }
    if($size != ""){
        $products = array_filter($products, function ($item) use($size){
            return $item['size'] === (int)$size;
        });
    }

    else if($color != ""){
        $products = array_filter($products, function ($item) use($color){
           return $item['color'] === (int)$color;
       });
    }


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
