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
        WebsiteMenu::create(['menu_item' => 'Home', 'url' => '/']);
        WebsiteMenu::create(['menu_item' => 'blog', 'url' => 'blog']);
        WebsiteMenu::create(['menu_item' => 'shop', 'url' => 'shop']);
        WebsiteMenu::create(['menu_item' => 'contact', 'url' => 'contact']);
        WebsiteMenu::create(['menu_item' => 'about us', 'url' => 'about-us']);
    }
}
