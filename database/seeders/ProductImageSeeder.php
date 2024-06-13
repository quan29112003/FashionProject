<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 2; $i <= 101; $i++) {
            ProductImage::create([
                'url' => 'https://routine.vn/media/amasty/webp/catalog/product/cache/5de180fdba0e830d350bd2803a0413e8/q/u/quan-cargo-nam-26-10s24pca003_natural_2__5_1_jpg.webp', // Điều chỉnh đường dẫn ảnh tương ứng
                'product_id' => $i,
            ]);
        }
    }
}
