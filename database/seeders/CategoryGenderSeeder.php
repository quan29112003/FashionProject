<?php

namespace Database\Seeders;

use App\Models\CategoryGender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryGender::create(['name' => 'Nam']);
        CategoryGender::create(['name' => 'Nữ']);
        CategoryGender::create(['name' => 'Unisex']);
    }
}
