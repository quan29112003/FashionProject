<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cataloguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogues')->insert([[
            'name' => 'Quần Bò',
            'description' => 'Cataloues exams',
            'category_id' => 1,
            'created_at' => Carbon::now()
        ],[
            'name' => 'Quần Đùi',
            'description' => 'Cataloues exams',
            'category_id' => 1,
            'created_at' => Carbon::now()
        ],[
            'name' => 'Quần Âu',
            'description' => 'Cataloues exams',
            'category_id' => 1,
            'created_at' => Carbon::now()
        ],[
            'name' => 'Quần Ống Rộng',
            'description' => 'Cataloues exams',
            'category_id' => 1,
            'created_at' => Carbon::now()
        ]]);
    }
}
