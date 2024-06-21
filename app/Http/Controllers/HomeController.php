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
        // Lấy 8 sản phẩm và sắp xếp theo product_id giảm dần
        $products = Product::with(['variants', 'images', 'category'])
        ->where('is_show_home', 1) // Chỉ lấy sản phẩm có is_show_home = 1
        ->get();
        

        // Fetch all categories separately
        $categories = Category::all();

        return view('client.layouts.home', compact('products', 'categories'));
    }
}
