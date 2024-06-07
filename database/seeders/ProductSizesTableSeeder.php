<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_sizes')->insert([
            ['id' => 1, 'size' => 'Small'],
            ['id' => 2, 'size' => 'Medium'],
            ['id' => 3, 'size' => 'Large'],
            // Add more sizes as needed
        ]);
    }
}
