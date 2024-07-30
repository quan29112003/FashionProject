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
        WebsiteMenu::create(['menu_item' => 'HOME', 'url' => '/']);
        WebsiteMenu::create(['menu_item' => 'BLOG', 'url' => 'blog']);
        WebsiteMenu::create(['menu_item' => "WOMEN'S", 'url' => '/']);
        WebsiteMenu::create(['menu_item' => "MEN'S", 'url' => '/']);
        WebsiteMenu::create(['menu_item' => 'SHOP', 'url' => 'shop']);
        WebsiteMenu::create(['menu_item' => 'CONTACT', 'url' => 'contact']);
        WebsiteMenu::create(['menu_item' => 'ABOUT', 'url' => 'about-us']);
    }
}
