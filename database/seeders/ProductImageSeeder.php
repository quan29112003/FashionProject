<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    // Lấy danh sách tất cả các product_id từ bảng products

    public function run()
    {
        $productIds = Product::pluck('id')->toArray();

        foreach ($productIds as $productId) {
            ProductImage::create([
                'url' => 'product01.jpg', // Điều chỉnh đường dẫn ảnh tương ứng
                'product_id' => $productId,
            ]);
        }
    }
}
