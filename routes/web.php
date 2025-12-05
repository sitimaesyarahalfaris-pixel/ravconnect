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
use App\Http\Controllers\MyEsimController;
use App\Models\Country;
use App\Http\Controllers\UserBankInfoController;
use App\Http\Controllers\AdminWithdrawalController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::get('/products/{id}/detail', [ProductController::class, 'detail'])->name('products.detail');
Route::get('/country/{id}', [CountryController::class, 'showProducts']);
Route::resource('countries', CountryController::class)->only(['index', 'show']);
Route::get('/support', function () {
    return view('support');
})->name('support');

Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy');
Route::view('/refund', 'refund');
Route::view('/disclaimer', 'disclaimer');

// Cart & Checkout (transaction allowed without user auth)
// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
// Payment delivery page with payment/order ID in URL
Route::get('/delivery/{id?}', [CartController::class, 'delivery'])->name('delivery');
Route::post('/payment/cancel', [CartController::class, 'cancelPayment'])->name('payment.cancel');
Route::post('/payment/status', [CartController::class, 'ajaxDepositStatus'])->name('payment.status');
Route::post('/payment/success-update', [CartController::class, 'updateDepositSuccess'])->name('payment.successUpdate');
Route::get('/search', [CartController::class, 'search'])->name('search');

// AJAX endpoint for full payment instructions
Route::get('/payment/instructions', [CartController::class, 'getPaymentInstructions'])->name('payment.instructions');

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
    Route::get('/my_esim', [UserController::class, 'myEsim'])->name('my_esim');
    Route::middleware(['auth'])->get('/my-esim', [\App\Http\Controllers\UserController::class, 'myEsim'])->name('my-esim');
    Route::middleware(['auth'])->get('/my-esim', [\App\Http\Controllers\MyEsimController::class, 'index'])->name('my-esim');
    Route::get('/order-history', [OrderController::class, 'history'])->name('order_history');
    // ...add more user features here
    // User bank info management (must be authenticated)
    Route::get('/user/bank-infos', [UserBankInfoController::class, 'index'])->name('user.bank_infos.index');
    Route::post('/user/bank-infos', [UserBankInfoController::class, 'store'])->name('user.bank_infos.store');
    Route::put('/user/bank-infos/{id}', [UserBankInfoController::class, 'update'])->name('user.bank_infos.update');
    Route::delete('/user/bank-infos/{id}', [UserBankInfoController::class, 'destroy'])->name('user.bank_infos.destroy');
    // User bank info management page
    Route::middleware(['auth'])->get('/user/bank-infos/manage', [UserController::class, 'bankInfos'])->name('user.bank_infos.manage');
});

// Admin authentication
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Simple admin dashboard (protected by regular auth middleware; controller checks is_admin)
Route::get('admin/simple', [AdminDashboardController::class, 'simpleIndex'])->name('admin.simple')->middleware('auth');

// Expose the main admin dashboard route (must be protected by admin middleware!)
Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Admin routes group (protected by admin middleware)
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('orders/{id}/detail', [OrderController::class, 'detail'])->name('admin.orders.detail');
    Route::get('/dashboard/stats', [AdminDashboardController::class, 'stats']);
    Route::resource('products', ProductController::class, ['as' => 'admin']);
    Route::resource('orders', OrderController::class, ['as' => 'admin']);
    Route::resource('payments', PaymentController::class, ['as' => 'admin']);
    Route::resource('product-stocks', ProductStockController::class, ['as' => 'admin']);
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::get('content', [AdminContentController::class, 'getContent']);
    Route::post('content/update', [AdminContentController::class, 'updateContent']);
    Route::post('content/update-recommended-products', [AdminContentController::class, 'updateRecommendedProducts']);
    Route::get('system/settings', [AdminSystemController::class, 'getSettings']);
    Route::post('system/settings/update', [AdminSystemController::class, 'updateSetting']);
    Route::post('products/{id}/quick-update', [ProductController::class, 'quickUpdate']);
    Route::post('orders/{id}/quick-status', [OrderController::class, 'quickStatus']);
    Route::post('payments/{id}/quick-confirm', [PaymentController::class, 'quickConfirm']);
    Route::get('export/{entity}', [AdminDashboardController::class, 'export']);
    Route::post('bulk/{entity}/action', [AdminDashboardController::class, 'bulkAction']);

    // eSIM stock management routes
    Route::get('products/{product}/stocks', [ProductStockController::class, 'list']);
    Route::post('products/{product}/stocks', [ProductStockController::class, 'storeForProduct']);
    Route::put('products/{product}/stocks/{stock}', [ProductStockController::class, 'updateForProduct']);
    Route::delete('products/{product}/stocks/{stock}', [ProductStockController::class, 'destroyForProduct']);

    Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::get('/admin/orders/export', [OrderController::class, 'export'])->name('admin.orders.export');
    Route::patch('/admin/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('admin.users.toggle-admin');

    // Admin withdrawal routes
    Route::get('/admin/withdrawal', [AdminWithdrawalController::class, 'showForm'])->name('admin.withdrawal.form');
    Route::post('/admin/withdrawal', [AdminWithdrawalController::class, 'withdraw'])->name('admin.withdrawal.submit');
    Route::post('admin/system/withdrawal-info', [AdminSystemController::class, 'saveWithdrawalInfo'])->name('admin.system.save_withdrawal_info');
});

// Add route to return user as JSON for AJAX edit modal
Route::get('admin/users/{id}/json', function ($id) {
    return \App\Models\User::findOrFail($id);
})->middleware('admin');

Route::get('admin/countries', function () {
    return view('admin.countries.index');
})->name('admin.countries.index');

Route::post('admin/countries/toggle', function (Illuminate\Http\Request $request) {
    $activeIds = $request->input('active_countries', []);
    Country::query()->update(['active' => false]);
    Country::whereIn('id', $activeIds)->update(['active' => true]);
    return redirect()->route('admin.countries.index')->with('success', 'Status negara berhasil diperbarui');
})->name('admin.countries.toggle');

Route::get('admin/countries/json/{id}', function ($id) {
    return \App\Models\Country::findOrFail($id);
});

Route::post('admin/countries/update', function (Illuminate\Http\Request $request) {
    $country = \App\Models\Country::findOrFail($request->input('id'));
    $country->name = $request->input('name');
    $country->code = $request->input('code');
    $country->flag_url = $request->input('flag_url');
    if ($request->hasFile('image_url')) {
        $file = $request->file('image_url');
        $path = $file->store('public/country_images');
        $country->image_url = str_replace('public/', 'storage/', $path);
    }
    $country->save();
    return redirect()->route('admin.countries.index')->with('success', 'Country updated');
})->name('admin.countries.update');

Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
