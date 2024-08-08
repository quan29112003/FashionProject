<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Admin\CategoryController,
    Admin\ProductController,
    Admin\ProductVariantController,
    Admin\ColorController,
    Admin\CommentController,
    Admin\CatalogueController,
    Admin\OrderController,
    Admin\ImageController,
    Admin\UserController,
    Admin\VoucherController,
    Admin\WishlistController,
    Admin\SizeController,
    Auth\AuthenticatedSessionController,
    Auth\RegisteredUserController,
    CartController,
    CheckoutController,
    DetailController,
    HomeController,
    SearchController,
    ShopController,
    BlogController,
    Controller,
    ProfileController,
    LoadContentController,
    LocationController,
    OrderControllerCli,
};
use App\Http\Middleware\ShareProvinces;

// Routes không yêu cầu đăng nhập
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', fn () => view('welcome'));
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::post('get-size', [ProductVariantController::class, 'getSize'])->name('getSizeProduct');
Route::get('/api/districts/{provinceId}', [LocationController::class, 'getDistricts']);
Route::get('/api/wards/{districtId}', [LocationController::class, 'getWards']);
Route::get('/search', [SearchController::class, 'search'])->name('product.search');

Route::view('/order-history', 'client.layouts.order-history')->name('order.history');
Route::view('/order-detail', 'client.layouts.order-detail')->name('order.detail');
Route::view('/order-detail2', 'client.layouts.order-detail2')->name('order.detail2');

Route::get('/detail/{id}-{name}', [DetailController::class, 'showDetail'])->name('detail');
Route::get('/getProductPrice', [DetailController::class, 'getProductPrice']);

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{id}', [ShopController::class, 'showCategory'])->name('shop.category');

Route::view('/blog', 'client.layouts.blog')->name('blog');
Route::view('/blog-detail', 'client.layouts.blog-detail')->name('blog-detail');

Route::view('/contact', 'client.layouts.contact')->name('contact');

Route::view('/cart', 'client.layouts.cart')->name('cart');

Route::view('/checkout', 'client.layouts.checkout')->name('checkout');

// Routes blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog-detail/{id}', [BlogController::class, 'show'])->name('blog-detail');

// Load content
Route::get('/load-content', [LoadContentController::class, 'loadContent'])->name('load-content');

// Routes yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Profile
    Route::middleware('share.provinces')->get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Wishlist
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('add/{productId}', [WishlistController::class, 'add'])->name('add');
        Route::delete('{id}', [WishlistController::class, 'destroy'])->name('remove');
    });

    // Order
    Route::post('/orders/{order}/cancel', [OrderControllerCli::class, 'cancel'])->name('orders.cancel');

    // Comment
    Route::prefix('products/{product}/comments')->group(function () {
        Route::post('/', [CommentController::class, 'store']);
        Route::get('/', [CommentController::class, 'index']);
    });

    // Order history
    Route::prefix('my-order-history')->group(function () {
        Route::get('/', [OrderControllerCli::class, 'index'])->name('user.orders.history');
        Route::get('/{order}', [OrderControllerCli::class, 'show'])->name('user.order.detail');
    });
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [Controller::class, 'dashboard']);
    Route::get('dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    // Product routes
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('create', [ProductController::class, 'create'])->name('store-product');
        Route::post('create', [ProductController::class, 'store'])->name('handleStore-product');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('edit/{id}', [ProductController::class, 'handleEdit'])->name('handleEdit-product');
        Route::post('update-status', [ProductController::class, 'updateStatus'])->name('update-product-status');

        // Product variant routes
        Route::prefix('variant')->group(function () {
            Route::get('{id}', [ProductVariantController::class, 'show'])->name('product-variant');
            Route::get('edit/{id}', [ProductVariantController::class, 'edit'])->name('edit-productVariant');
            Route::put('edit/{id}', [ProductVariantController::class, 'handleEdit'])->name('handleEdit-productVariant');
        });
    });

    // Category routes
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('create', [CategoryController::class, 'create'])->name('store-category');
        Route::post('create', [CategoryController::class, 'store'])->name('store-category');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit-category');
        Route::put('edit/{id}', [CategoryController::class, 'update'])->name('update-category');
    });

    // Color routes
    Route::prefix('color')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('color');
        Route::get('create', [ColorController::class, 'create'])->name('store-color');
        Route::post('create', [ColorController::class, 'store'])->name('store-color');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('edit-color');
        Route::put('edit/{id}', [ColorController::class, 'update'])->name('update-color');
    });

    // Size routes
    Route::prefix('size')->group(function () {
        Route::get('/', [SizeController::class, 'index'])->name('size');
        Route::get('create', [SizeController::class, 'create'])->name('store-size');
        Route::post('create', [SizeController::class, 'store'])->name('store-size');
        Route::get('edit/{id}', [SizeController::class, 'edit'])->name('edit-size');
        Route::put('edit/{id}', [SizeController::class, 'update'])->name('update-size');
    });

    // Order routes
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order');
        Route::get('item/{id}', [OrderController::class, 'show'])->name('order-item');
        Route::put('edit/{id}', [OrderController::class, 'update'])->name('edit-order');
        Route::get('check-new-order', [OrderController::class, 'checkNewOrder'])->name('check-new-order');
        Route::get('statistics', [OrderController::class, 'statistics'])->name('orders.statistics');
        Route::get('single_date_statistics', [OrderController::class, 'singleDateStatistics'])->name('orders.single_date_statistics');
        Route::get('date_range_statistics', [OrderController::class, 'dateRangeStatistics'])->name('orders.date_range_statistics');
        Route::get('filter', [OrderController::class, 'filterOrders'])->name('orders.filter');
        Route::get('customer_statistics', [OrderController::class, 'customerStatistics'])->name('orders.customer_statistics');
        Route::get('statistic', [OrderController::class, 'chart'])->name('statistic');
    });

    // Catalogue routes
    Route::prefix('catalogue')->group(function () {
        Route::get('/', [CatalogueController::class, 'index'])->name('catalogue');
        Route::post('store', [CatalogueController::class, 'store'])->name('store-catalogue');
        Route::put('edit/{id}', [CatalogueController::class, 'update'])->name('edit-catalogues');
    });

    // Image routes
    Route::prefix('image')->group(function () {
        Route::get('{id}', [ImageController::class, 'index'])->name('image');
        Route::get('edit/{id}', [ImageController::class, 'edit'])->name('edit-image');
        Route::put('edit/{id}', [ImageController::class, 'handleEdit'])->name('handleEdit-image');
    });

    // Wishlist routes
    Route::resource('wishlists', WishlistController::class);
    Route::delete('wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // User routes
    Route::resource('users', UserController::class);
    Route::post('users/{user}/toggle-lock', [UserController::class, 'toggleLock'])->name('users.toggleLock');
    Route::post('users/{user}/permanent-lock', [UserController::class, 'permanentLock'])->name('users.permanentLock');

    // Voucher routes
    Route::resource('vouchers', VoucherController::class);
    Route::get('products/{categoryId}', [VoucherController::class, 'getProductsByCategory']);

    // Comment routes
    Route::resource('comments', CommentController::class);
    Route::post('comments/{id}/toggleVisibility', [CommentController::class, 'toggleVisibility'])->name('comments.toggleVisibility');

    // Blog routes
    Route::post('/upload', [BlogController::class, 'upload'])->name('blogs.upload');
    Route::resource('blogs', BlogController::class);
});

// Cart and Checkout routes
Route::prefix('cart')->group(function () {
    Route::post('add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'showCheckout'])->name('checkout');
    Route::post('process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('vnpay_return', [CheckoutController::class, 'vnpayReturn'])->name('vnpay_return');
});

require __DIR__ . '/auth.php';
