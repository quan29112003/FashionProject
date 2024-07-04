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
        }, 'images'])
            ->where('is_active', 1) // Chỉ lấy sản phẩm có is_active = 1
            ->get()
            ->map(function ($product) {
                // Attach the first variant to the product (if exists)
                $product->variant = $product->variants->first();
                // Clear the variants collection to only include the selected one
                $product->setRelation('variants', collect([$product->variant]));
                return $product;
            });

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
