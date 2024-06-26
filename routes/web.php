<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\ProductColor;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SizeController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\OrderController;


use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Auth\RegisteredUserController;


// Route trang chủ không yêu cầu đăng nhập
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

//đăng nhập
Route::get('/login', function () {
    return view('welcome');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
//tạo tài khoản
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});



Route::get('/search', [SearchController::class, 'search'])->name('product.search');
Route::get('/detail/{id}', [DetailController::class, 'showDetail'])->name('detail');
Route::get('/getProductPrice', [DetailController::class, 'getProductPrice']);
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

Route::get('/cart', function () {
    return view('client.layouts.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('client.layouts.checkout');
})->name('checkout');
// nghi
Route::get('/admin', [Controller::class, 'dasboard']);


Route::prefix('admin')->group(function () {
    Route::get('show-product', [ProductController::class, 'index'])->name('product');
    Route::get('create-product', [ProductController::class, 'create'])->name('store-product');
    Route::post('create-product', [ProductController::class, 'store'])->name('handleStore-product');
    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::put('edit-product/{id}', [ProductController::class, 'handleEdit'])->name('handleEdit-product');

    Route::get('product-variant/{id}', [ProductVariantController::class, 'show'])->name('product-variant');
    Route::get('edit-product-variant/{id}', [ProductVariantController::class, 'edit'])->name('edit-productVariant');
    Route::put('edit-product-variant/{id}', [ProductVariantController::class, 'handleEdit'])->name('handleEdit-productVariant');

    Route::get('show-category', [CategoryController::class, 'index'])->name('category');
    Route::get('create-category', [CategoryController::class, 'create'])->name('store-category');
    // Route::post('create-category',[CategoryController::class,'store'])->name('handleStore-category');
    Route::post('store-category', [CategoryController::class, 'store'])->name('store-category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    // Route::put('edit-category/{id}',[CategoryController::class, 'handleEdit'])->name('handleEdit-category');
    Route::put('edit-category/{id}', [CategoryController::class, 'update'])->name('update-category');


    Route::get('show-color', [ColorController::class, 'index'])->name('color');
    Route::get('create-color', [ColorController::class, 'create'])->name('store-color');
    Route::post('store-color', [ColorController::class, 'store'])->name('store-color');
    // Route::post('create-color',[ColorController::class, 'store'])->name('handleStore-color');
    Route::get('edit-color/{id}', [ColorController::class, 'edit'])->name('edit-color');
    // Route::put('edit-color/{id}',[ColorController::class, 'handleEdit'])->name('handleEdit-color');
    Route::put('edit-color/{id}', [ColorController::class, 'update'])->name('update-color');

    Route::get('show-size', [SizeController::class, 'index'])->name('size');
    Route::get('create-size', [SizeController::class, 'create'])->name('store-size');
    // Route::post('create-size',[SizeController::class, 'store'])->name('handleStore-size');
    Route::post('store-size', [SizeController::class, 'store'])->name('store-size');
    Route::get('edit-size/{id}',[SizeController::class, 'edit'])->name('edit-size');
    Route::put('edit-size/{id}',[SizeController::class, 'update'])->name('update-size');

    Route::get('order',[OrderController::class, 'index'])->name('order');
    Route::get('order-item/{id}',[OrderController::class, 'show'])->name('order-item');
    Route::put('edit-order/{id}',[OrderController::class, 'update'])->name('edit-order');

    Route::get('catalogue',[CatalogueController::class,'index'])->name('catalogue');
    Route::post('store-catalogue', [CatalogueController::class, 'store'])->name('store-catalogue');
    Route::put('edit-catalogues/{id}', [CatalogueController::class, 'update'])->name('edit-catalogues');

    Route::get('image/{id}', [ImageController::class, 'index'])->name('image');
    Route::get('edit-image/{id}', [ImageController::class, 'edit'])->name('edit-image');
    Route::put('edit-image/{id}', [ImageController::class, 'handleEdit'])->name('handleEdit-image');
});


// viet
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('vouchers', VoucherController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('wishlists', WishlistController::class);
});


require __DIR__ . '/auth.php';
