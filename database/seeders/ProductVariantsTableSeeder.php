<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variants')->insert([
            [
                'productID' => 1,
                'colorID' => 1,
                'sizeID' => 1,
                'quantity' => 100,
                'price' => 19.99,
                'type' => 'Standard',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productID' => 1,
                'colorID' => 2,
                'sizeID' => 2,
                'quantity' => 50,
                'price' => 21.99,
                'type' => 'Premium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productID' => 2,
                'colorID' => 1,
                'sizeID' => 3,
                'quantity' => 200,
                'price' => 15.99,
                'type' => 'Standard',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more product variant entries as needed
        ]);
    }
}
