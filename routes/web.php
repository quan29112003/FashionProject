<?php

use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('points', AdminPointController::class);
// });
Route::get('/', function () {
    return view('client.layouts.home');
})->name('home');

// routes/web.php
Route::resource('/', HomeController::class);



Route::get('/search', [SearchController::class, 'search'])->name('product.search');


Route::get('/detail/{id}', [DetailController::class, 'showDetail'])->name('detail');
Route::get('/getProductPrice', [DetailController::class, 'getProductPrice']);

Route::get('/cart', function () {
    return view('client.layouts.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('client.layouts.checkout');
})->name('checkout');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{id}', [ShopController::class, 'showCategory'])->name('shop.category');

Route::get('/blog', function () {
    return view('client.layouts.blog');
})->name('blog');
Route::get('/blog-detail', function () {
    return view('client.layouts.blog-detail');
})->name('blog-detail');
Route::get('/contact', function () {
    return view('client.layouts.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('client.layouts.home');
})->name('blog');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
