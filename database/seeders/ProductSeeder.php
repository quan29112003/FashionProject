<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'title' => 'Product 1',
            'category' => 'women',
            'image' => 'url1',
            'price' => 100,
            'description' => 'Description 1'
        ]);

        Product::create([
            'title' => 'Product 2',
            'category' => 'men',
            'image' => 'https://imgcdn.thitruongsi.com/tts/rs:fill:600:0:1:1/g:sm/plain/file://product/2022/12/23/4045ff80-82c9-11ed-b479-8f832fb2fd53.jpg',
            'price' => 200,
            'description' => 'Description 2'
        ]);
    }
}
