<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Category 1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Category 2', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Category 3', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
