<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'code' => 'SUMMER2024',
                'description' => 'Summer Sale 2024',
                'discount' => 15.00,
                'start_date' => Carbon::create('2024', '06', '01'),
                'end_date' => Carbon::create('2024', '06', '30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'WINTER2024',
                'description' => 'Winter Sale 2024',
                'discount' => 20.00,
                'start_date' => Carbon::create('2024', '12', '01'),
                'end_date' => Carbon::create('2024', '12', '31'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'BLACKFRIDAY2024',
                'description' => 'Black Friday 2024',
                'discount' => 50.00,
                'start_date' => Carbon::create('2024', '11', '29'),
                'end_date' => Carbon::create('2024', '11', '29'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
