<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'Chưa xác nhận'],
            ['name' => 'Đã xác nhận'],
            ['name' => 'Đang xử lý'],
            ['name' => 'Đang giao hàng'],
            ['name' => 'Đã giao hàng'],
            ['name' => 'Đã hoàn thành'],
            ['name' => 'Đã hủy'],
        ]);
    }
}
