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
                'url' => 'https://routine.vn/media/amasty/webp/catalog/product/cache/5de180fdba0e830d350bd2803a0413e8/q/u/quan-cargo-nam-26-10s24pca003_natural_2__5_1_jpg.webp', // Điều chỉnh đường dẫn ảnh tương ứng
                'product_id' => $productId,
            ]);
        }
    }
}
