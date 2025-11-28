<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentWebhookController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminSystemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;


// Public routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::get('/products/{id}/detail', [ProductController::class, 'detail'])->name('products.detail');
Route::get('/country/{id}', [CountryController::class, 'showProducts']);
Route::resource('countries', CountryController::class)->only(['index', 'show']);

// Cart & Checkout (transaction allowed without user auth)
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
Route::get('/delivery', [CartController::class, 'delivery'])->name('delivery');

// Payment webhook
Route::post('payment/webhook', [PaymentWebhookController::class, 'handle']);

// User authentication (simple)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// User routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/my-esim', [UserController::class, 'myEsim'])->name('my_esim');
    Route::get('/order-history', [OrderController::class, 'history'])->name('order_history');
    // ...add more user features here
});

// Admin authentication
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Simple admin dashboard (protected by regular auth middleware; controller checks is_admin)
Route::get('admin/simple', [AdminDashboardController::class, 'simpleIndex'])->name('admin.simple')->middleware('auth');

// Expose the main admin dashboard route (auth protected)
Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Admin routes group (protected by auth; controllers enforce admin checks)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard/stats', [AdminDashboardController::class, 'stats']);
    Route::resource('products', ProductController::class, ['as' => 'admin']);
    Route::resource('orders', OrderController::class, ['as' => 'admin']);
    Route::resource('payments', PaymentController::class, ['as' => 'admin']);
    Route::resource('product-stocks', ProductStockController::class, ['as' => 'admin']);
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::get('content', [AdminContentController::class, 'getContent']);
    Route::post('content/update', [AdminContentController::class, 'updateContent']);
    Route::get('system/settings', [AdminSystemController::class, 'getSettings']);
    Route::post('system/settings/update', [AdminSystemController::class, 'updateSetting']);
    Route::post('products/{id}/quick-update', [ProductController::class, 'quickUpdate']);
    Route::post('orders/{id}/quick-status', [OrderController::class, 'quickStatus']);
    Route::post('payments/{id}/quick-confirm', [PaymentController::class, 'quickConfirm']);
    Route::get('export/{entity}', [AdminDashboardController::class, 'export']);
    Route::post('bulk/{entity}/action', [AdminDashboardController::class, 'bulkAction']);
});
