<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    // public function index()
    // {
    //     $sizes = ProductSize::all();
    //     $colors = ProductColor::all();
    //     $categories = Category::all();
    //     // Giả sử bạn cũng cần lấy danh sách sản phẩm từ bảng sản phẩm
    //     $products = Product::with(['variants', 'images', 'category'])

    //         ->paginate(12); // Số sản phẩm trên mỗi trang là 12

    //     return view('client.layouts.shop', compact('sizes', 'colors', 'products', 'categories'));
    // }



    public function index(Request $request)
    {
        $categories = Category::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        

        $query = Product::with('variants', 'images');

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = (float)$request->input('min_price');
            $maxPrice = (float)$request->input('max_price');
    
            $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                $q->where('price', '>=', $minPrice)
                  ->where('price', '<=', $maxPrice);
            });
        }

        $products = $query->get();

        return view('client.layouts.shop', compact('categories', 'sizes', 'colors', 'products'));
    }


    public function showCategory($id)
    {
        $categories = Category::all();
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        $products = Product::where('category_id', $id)->with('variants', 'images')->paginate(12);

        return view('shop.index', compact('categories', 'sizes', 'colors', 'products'));
    }
    
}
