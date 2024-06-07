<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('product_colors')->insert([
            ['color' => 'Red', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['color' => 'Green', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['color' => 'Blue', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
