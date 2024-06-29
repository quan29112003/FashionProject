<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $size = $request->input('size');
        $price = $request->input('price');
        $color = $request->input('color');

        // Tìm kiếm sản phẩm dựa trên tên sản phẩm chứa từ khóa
        if($keyword != '' && $keyword != null){
            $products = Product::with(['variants', 'images'])
            ->where('name_product', 'LIKE', "%{$keyword}%")
            ->get()->toArray();
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

        // Render view partials.search_results với các sản phẩm tìm được
        $searchResultsHtml = view('client.partials.search_results', compact('products'))->render();

        return response()->json($searchResultsHtml);
    }
}
