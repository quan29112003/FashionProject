<?php

namespace App\Providers;

use App\Models\WebsiteMenu;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // lấy menu cho tất cả các trang trên header
        $menus = WebsiteMenu::all();
        View::share('menus', $menus);
    }
}
