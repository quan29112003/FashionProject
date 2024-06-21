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
        $images = [
            'product01.jpg',
            'product02.jpg',
            'product03.jpg',
            'product04.jpg',
            'product05.jpg',
            'product06.jpg',
            'product07.jpg',
            'product08.jpg',
            'product09.jpg',
            'product10.jpg',
            'product11.jpg',
            'product12.jpg',
            'product13.jpg',
            'product14.jpg',
            'product15.jpg',
            'product16.jpg',
        ];

        foreach ($images as $image) {
            foreach ($productIds as $productId) {
                ProductImage::create([
                    'url' => $image, // Điều chỉnh đường dẫn ảnh tương ứng
                    'product_id' => $productId,
                ]);
            }
        }
    }
}
