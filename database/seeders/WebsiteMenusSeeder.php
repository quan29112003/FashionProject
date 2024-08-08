<?php

namespace Database\Seeders;

use App\Models\WebsiteMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteMenu::create(['menu_item' => 'Trang chủ', 'url' => '/']);
        WebsiteMenu::create(['menu_item' => 'Tin tức', 'url' => 'blog']);
        WebsiteMenu::create(['menu_item' => 'Sản phẩm', 'url' => 'shop']);
        WebsiteMenu::create(['menu_item' => 'Liện hệ', 'url' => 'contact']);
        WebsiteMenu::create(['menu_item' => 'Về chúng tôi', 'url' => 'about-us']);
    }
}
