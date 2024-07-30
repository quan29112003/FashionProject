<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductSize;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ProductColorSeeder::class,
            ProductSizeSeeder::class,
            ProductVariantSeeder::class,
            // UserSeeder::class,
            WebsiteMenusSeeder::class,
            CategoryGenderSeeder::class,
            cataloguesSeeder::class
        ]);

    }
}
