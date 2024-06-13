<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'áo nam', 'description' => 'Các loại áo dành cho nam']);
        Category::create(['name' => 'quần nam', 'description' => 'Các loại quần dành cho nam']);
        Category::create(['name' => 'phụ kiện', 'description' => 'Các loại phụ kiện']);
    }
}
