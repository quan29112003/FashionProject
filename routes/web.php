<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\{
    Admin\CategoryController,
    Admin\ProductController,
    Admin\ProductVariantController,
    Admin\ColorController,
    Admin\CommentController,
    Admin\SizeController,
    Admin\CatalogueController,
    Admin\OrderController,
    Admin\ImageController,
    Admin\UserController,
    Admin\VoucherController,
    Admin\WishlistController,
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
use App\Http\Middleware\CheckWishlist;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

// Route trang chủ không yêu cầu đăng nhập
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');
//đăng nhập
Route::view('/login', 'welcome')->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
//tạo tài khoản
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
// liên quan đến địa chỉ
Route::prefix('api')->group(function () {
    Route::get('districts/{provinceId}', [LocationController::class, 'getDistricts']);
    Route::get('wards/{districtId}', [LocationController::class, 'getWards']);
});
// xem lịch sử đơn hàng

Route::get('/order-history', function () {
    return view('client.layouts.order-history');
})->name('order.history');

Route::get('/order-detail', function () {
    return view('client.layouts.order-detail');
})->name('order.detail');

Route::get('/order-detail2', function () {
    return view('client.layouts.order-detail2');
})->name('order.detail2');
Route::get('/orders/{id}/invoice', [OrderControllerCli::class, 'showInvoice'])->name('orders.invoice');

// phần giỏ hàng
Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('/add', [CartController::class, 'addToCart'])->name('add');
    Route::post('/update', [CartController::class, 'updateCart'])->name('update');
    Route::post('/remove', [CartController::class, 'removeFromCart'])->name('remove');
    Route::post('/clear', [CartController::class, 'clearCart'])->name('clear');
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
    Route::view('/', 'client.layouts.cart')->name('cart');
    Route::get('/', [CartController::class, 'index'])->name('index');
});
Route::post('/clear-success-order-session', function () {
    Session::forget('success_order');
    return response()->json(['status' => 'Session cleared']);
})->name('clear.success.order.session');
// vnpay
Route::get('/vnpay_return', [CheckoutController::class, 'vnpayReturn'])->name('vnpay_return');
// checkout
// Route::prefix('checkout')->name('checkout.')->group(function () {
//     Route::get('/', [CheckoutController::class, 'showCheckout'])->name('show');
//     Route::post('/process', [CheckoutController::class, 'processCheckout'])->name('process');
//     Route::view('/', 'client.layouts.checkout')->name('checkout');
// });

Route::get('/checkout', function () {
    return view('client.layouts.checkout');
})->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
// lịch sử đơn hàng
Route::name('user.orders.')->group(function () {
    Route::get('/my-order-history', [OrderControllerCli::class, 'index'])->name('history');
    Route::get('/my-order-detail/{order}', [OrderControllerCli::class, 'show'])->name('detail');
});

Route::view('/about-us', 'client.layouts.about-us')->name('about-us');


// trang blog
Route::view('/blog', 'client.layouts.blog')->name('blog');
Route::view('/blog-detail', 'client.layouts.blog-detail')->name('blog-detail');
// blog trong admin
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog-detail/{id}', [BlogController::class, 'show'])->name('blog-detail');
// trang liên hệ
Route::view('/contact', 'client.layouts.contact')->name('contact');
// chi tiết sản phẩn
Route::get('/detail/{id}-{name}', [DetailController::class, 'showDetail'])->name('detail');
Route::get('/getProductPrice', [DetailController::class, 'getProductPrice']);
// trang shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{id}', [ShopController::class, 'showCategory'])->name('shop.category');
// ??
Route::post("get-size", [ProductVariantController::class, "getSize"])->name('getSizeProduct');
Route::get('/search', [SearchController::class, 'search'])->name('product.search');
Route::get('/load-content', [LoadContentController::class, 'loadContent'])->name('load-content');
// trang phải đăng nhập cho user
Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit')->middleware('share.provinces');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        // Route::get('/', 'WishlistController@index')->name('index');
        Route::post('/add/{productId}', [WishlistController::class, 'add'])->name('add');
        Route::delete('/{id}', [WishlistController::class, 'destroy'])->name('remove');
    });
    Route::post('/orders/{order}/cancel', [OrderControllerCli::class, 'cancel'])->name('orders.cancel');
});

// đăng nhập admin
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // trong admin
    Route::prefix('admin')->group(function () {
        Route::get('show-product', [ProductController::class, 'index'])->name('product');
        Route::get('create-product', [ProductController::class, 'create'])->name('store-product');
        Route::post('create-product', [ProductController::class, 'store'])->name('handleStore-product');
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('edit-product/{id}', [ProductController::class, 'handleEdit'])->name('handleEdit-product');

        Route::get('product-variant/{id}', [ProductVariantController::class, 'show'])->name('product-variant');
        Route::get('edit-product-variant/{id}', [ProductVariantController::class, 'edit'])->name('edit-productVariant');
        Route::put('edit-product-variant/{id}', [ProductVariantController::class, 'handleEdit'])->name('handleEdit-productVariant');

        Route::post('/product/update-status', [ProductController::class, 'updateStatus'])->name('update-product-status');

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
        Route::get('edit-size/{id}', [SizeController::class, 'edit'])->name('edit-size');
        Route::put('edit-size/{id}', [SizeController::class, 'update'])->name('update-size');

        Route::get('order', [OrderController::class, 'index'])->name('order');
        Route::get('order-item/{id}', [OrderController::class, 'show'])->name('order-item');
        Route::put('edit-order/{id}', [OrderController::class, 'update'])->name('edit-order');
        Route::get('/check-new-order', [OrderController::class, 'checkNewOrder'])->name('check-new-order');

        Route::prefix('orders')->group(function () {
            Route::get('/single_date_statistics', [OrderController::class, 'singleDateStatistics'])->name('orders.single_date_statistics');
            Route::get('/date_range_statistics', [OrderController::class, 'dateRangeStatistics'])->name('orders.date_range_statistics');
            Route::get('/filter', [OrderController::class, 'filterOrders'])->name('orders.filter');
            Route::get('/statistics', [OrderController::class, 'statistics'])->name('orders.statistics');
            Route::get('/customer_statistics', [OrderController::class, 'customerStatistics'])->name('orders.customer_statistics');
            Route::get('/statistic', [OrderController::class, 'chart'])->name('statistic');
        });

        Route::get('catalogue', [CatalogueController::class, 'index'])->name('catalogue');
        Route::post('store-catalogue', [CatalogueController::class, 'store'])->name('store-catalogue');
        Route::put('edit-catalogues/{id}', [CatalogueController::class, 'update'])->name('edit-catalogues');

        Route::get('image/{id}', [ImageController::class, 'index'])->name('image');
        Route::get('edit-image/{id}', [ImageController::class, 'edit'])->name('edit-image');
        Route::put('edit-image/{id}', [ImageController::class, 'handleEdit'])->name('handleEdit-image');

        Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
        Route::get('/', [Controller::class, 'dashboard']);
        Route::get('show-product', [ProductController::class, 'index'])->name('product');
        Route::get('create-product', [ProductController::class, 'create'])->name('store-product');
        Route::post('create-product', [ProductController::class, 'store'])->name('handleStore-product');
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('edit-product/{id}', [ProductController::class, 'handleEdit'])->name('handleEdit-product');
    });
    // đăng nhập tài khoản admin mới vào được
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('wishlists', WishlistController::class);
        Route::resource('users', UserController::class);
        Route::post('users/{user}/toggle-lock', 'App\Http\Controllers\Admin\UserController@toggleLock')->name('users.toggleLock');
        Route::post('users/{user}/permanent-lock', 'App\Http\Controllers\Admin\UserController@permanentLock')->name('users.permanentLock');
        Route::resource('vouchers', VoucherController::class);
        Route::get('/products/{categoryId}', [VoucherController::class, 'getProductsByCategory']);
        Route::resource('comments', CommentController::class);
        Route::post('comments/{id}/toggleVisibility', [CommentController::class, 'toggleVisibility'])->name('comments.toggleVisibility');
        Route::post('/upload', [AdminBlogController::class, 'upload'])->name('blogs.upload');
        Route::resource('blogs', AdminBlogController::class);
        Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    });
});

require __DIR__ . '/auth.php';
