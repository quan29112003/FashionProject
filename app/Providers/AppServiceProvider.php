<?php

namespace App\Providers;

use App\Models\Catalogue;
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
        View::composer('*', function ($view) {
            if (!\App::runningInConsole()) {
                $view->with('menus', WebsiteMenu::all());
                $view->with('CategoryGenders', CategoryGender::all());
                view()->composer('*', function ($view) {
                    $categories = Category::with('catalogues')->get();

                    $view->with('categories', $categories);
                });
                $view->with('wishlists', Wishlist::where('user_id', Auth::id())
                ->with(['product.variants.color', 'product.variants.size', 'product.images'])
                ->get());
            }
        });
    }
}
