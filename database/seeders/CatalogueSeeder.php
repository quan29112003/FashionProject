<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use App\Models\Category;
use App\Models\CategoryGender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        foreach ($categoryIds as $categoryId) {
            Catalogue::create(['name' => 'áo phông', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'áo sơ mi dài', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'áo sơ mi cộc', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'quần dài', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'quần sooc', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'quần bò', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            Catalogue::create(['name' => 'phụ kiện', 'category_gender_id' => null, 'category_id' => $categoryId, 'description' => '']);
            break;
        }
    }
}
