<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'categoryID' => 1, // Assuming 'Electronics' has ID 1
                'nameProduct' => 'Smartphone',
                'description' => 'Latest model smartphone with advanced features.',
                'price' => 999.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoryID' => 2, // Assuming 'Books' has ID 2
                'nameProduct' => 'Laravel for Beginners',
                'description' => 'Comprehensive guide to Laravel framework.',
                'price' => 29.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoryID' => 3, // Assuming 'Clothing' has ID 3
                'nameProduct' => 'T-Shirt',
                'description' => 'Comfortable cotton t-shirt.',
                'price' => 19.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
