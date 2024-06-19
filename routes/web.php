<?php

use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;


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
// Route::get('/', function () {
//     return view('client.layouts.home');
// })->name('/');
// routes/web.php
Route::resource('/', HomeController::class);



Route::get('/search', [SearchController::class, 'search'])->name('product.search');


Route::get('/detail/{id}', [DetailController::class, 'showDetail'])->name('detail');

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
Route::resource('users', UserController::class);
Route::resource('vouchers', VoucherController::class);
Route::resource('comments', CommentController::class);
Route::resource('wishlists', WishlistController::class);

Route::get('/blog', function(){
    return view('client.layouts.home');
})->name('blog');
