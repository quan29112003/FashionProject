<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_product')->insert([
            ['category_id' => 2, 'product_id' => 1],
            ['category_id' => 1, 'product_id' => 1],
            ['category_id' => 2, 'product_id' => 1],
            ['category_id' => 2, 'product_id' => 3],
            // Add more category-product associations as needed
        ]);
    }
}
