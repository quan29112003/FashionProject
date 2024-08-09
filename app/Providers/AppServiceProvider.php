<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CategoryGender;
use App\Models\WebsiteMenu;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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
//        $menus = WebsiteMenu::all();
//        View::share('menus', $menus);
//
//        $categories = Category::all();
//        view::share('categories', $categories);
//
//        // lấy category giới tính cá trang trên header
//        $CategoryGenders = CategoryGender::all();
//        View::share('CategoryGenders', $CategoryGenders);
        View::composer('*', function ($view) {
            if (!\App::runningInConsole()) {
                $view->with('menus', WebsiteMenu::all());
                $view->with('categories', Category::all());
                $view->with('CategoryGenders', CategoryGender::all());
            }
        });
    }
}
