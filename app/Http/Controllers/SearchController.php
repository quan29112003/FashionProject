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
    $products = Product::with(['variants', 'images'])
        ->where('name_product', 'LIKE', "%{$keyword}%")
        ->get();

    // Render view partials.search_results với các sản phẩm tìm được
    $searchResultsHtml = view('client.partials.search_results', compact('products'))->render();

    // Trả về kết quả dưới dạng JSON
    return response()->json($searchResultsHtml);
}

}
