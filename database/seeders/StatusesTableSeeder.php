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
            ['name' => 'Chờ xử lý'],
            ['name' => 'Chưa xác nhận'],
            ['name' => 'Xác nhận'],
            ['name' => 'Đang chuẩn bị hàng'],
            ['name' => 'Đang giao hàng'],
            ['name' => 'Đã giao hàng'],
            ['name' => 'Đã hoàn thành'],
            ['name' => 'Đã hủy'],
        ]);
    }
}
