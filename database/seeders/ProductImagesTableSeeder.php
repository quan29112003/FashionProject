<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            [
                'url' => 'https://media.baoquangninh.vn/upload/image/202310/medium/2137171_f1207af841cbfc6683b03f4d1fdab7ce.jpg',
                'productID' => 1, // Ensure product with ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'url' => 'https://noithatbinhminh.com.vn/wp-content/uploads/2022/08/anh-dep-40.jpg.webp',
                'productID' => 1, // Ensure product with ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'url' => 'https://images2.thanhnien.vn/528068263637045248/2023/5/11/base64-1683774325007671396078.png',
                'productID' => 2, // Ensure product with ID 2 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
