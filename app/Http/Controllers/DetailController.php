<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductVariant;

class DetailController extends Controller
{
    public function showDetail($id)
    {
        // Lấy thông tin chi tiết của sản phẩm dựa vào ID
        $product = Product::findOrFail($id);

        // Lấy giá của sản phẩm từ biến thể đầu tiên
        $variant = ProductVariant::where('product_id', $id)->first();
        $price = $variant ? $variant->price : $product->price;
        $price_sale = $variant ? $variant->price_sale : null;

        // Lấy danh sách hình ảnh sản phẩm từ bảng product-images
        $images = ProductImage::where('product_id', $id)->get();

        // Lấy tên danh mục từ bảng categories
        $category = Category::findOrFail($product->category_id)->name;

        // Lấy danh sách các biến thể (màu sắc và kích thước)
        $variants = ProductVariant::where('product_id', $id)->get();

        // Lấy danh sách sản phẩm liên quan theo category_id
        $relatedProducts = Product::where('category_id', $product->category_id)
                                   ->where('id', '!=', $id)
                                   ->get()
                                   ->map(function ($relatedProduct) {
                                       $variant = ProductVariant::where('product_id', $relatedProduct->id)->first();
                                       $relatedProduct->price = $variant ? $variant->price : $relatedProduct->price;
                                       $relatedProduct->price_sale = $variant ? $variant->price_sale : null;
                                       return $relatedProduct;
                                   });

        // Trả về view chi tiết sản phẩm với dữ liệu sản phẩm tương ứng
        return view('client.layouts.detail', compact('product', 'price', 'price_sale', 'images', 'category', 'variants', 'relatedProducts'));
    }
}
