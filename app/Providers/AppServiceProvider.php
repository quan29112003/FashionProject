<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //
    }
    public function boot(): void
    {
        // lấy menu cho tất cả các trang trên header
        $menus = WebsiteMenu::all();
        View::share('menus', $menus);

        // lấy category giới tính cá trang trên header
        $CategoryGenders = CategoryGender::all();
        View::share('CategoryGenders', $CategoryGenders);
    }
}
