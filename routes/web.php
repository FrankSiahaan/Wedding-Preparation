<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ReviewController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


// Auth Routes
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'storelogin'])->name('login.store');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Public Product Routes
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::post('/search', [ProductController::class, 'filter'])->name('product.filter');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

// Vendor Auth Routes (Must be before vendor/{id} route)
Route::get('/vendor/login', [VendorController::class, 'showLoginForm'])->name('vendor.login');
Route::post('/vendor/login', [VendorController::class, 'login'])->name('vendor.login.store');

// Vendor Dashboard Routes (Admin only)
Route::middleware(['auth', 'vendor'])->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');

    // Product Management
    Route::get('/products', [VendorController::class, 'products'])->name('vendor.products');
    Route::get('/products/create', [VendorController::class, 'createProduct'])->name('vendor.products.create');
    Route::post('/products', [VendorController::class, 'storeProduct'])->name('vendor.products.store');
    Route::get('/products/{id}/edit', [VendorController::class, 'editProduct'])->name('vendor.products.edit');
    Route::put('/products/{id}', [VendorController::class, 'updateProduct'])->name('vendor.products.update');
    Route::delete('/products/{id}', [VendorController::class, 'deleteProduct'])->name('vendor.products.delete');
    Route::delete('/products/images/{id}', [VendorController::class, 'deleteProductImage'])->name('vendor.products.image.delete');

    // Profile Management
    Route::get('/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::put('/profile', [VendorController::class, 'updateProfile'])->name('vendor.profile.update');

    // Booking Management
    Route::get('/bookings', [VendorController::class, 'bookings'])->name('vendor.bookings');
});

// Vendor Public Routes (Must be after specific routes)
Route::get('/vendor/{id}', [VendorController::class, 'show'])->name('vendor.show');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Home
    Route::get('/', [ProductController::class, 'home']);
    Route::get('/home', [ProductController::class, 'home'])->name('home');

    // User Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // User Addresses
    Route::get('/addresses', [UserController::class, 'addresses'])->name('user.addresses');
    Route::post('/addresses', [AddressController::class, 'store'])->name('user.address.store');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('user.address.update');
    Route::put('/addresses/{id}/set-primary', [AddressController::class, 'setPrimary'])->name('user.address.set-primary');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('user.address.delete');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/{cartItemId}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/{cartItemId}', [CartController::class, 'removeItem'])->name('cart.remove');

    // Checkout
    Route::get('/checkout/shipping', [TransactionController::class, 'checkoutShipping'])->name('checkout.shipping');
    Route::get('/checkout/confirmation', function () {
        return redirect()->route('checkout.shipping')->with('error', 'Silakan isi alamat pengiriman terlebih dahulu');
    });
    Route::post('/checkout/confirmation', [TransactionController::class, 'checkoutConfirmation'])->name('checkout.confirmation');
    Route::post('/checkout/process', [TransactionController::class, 'processOrder'])->name('checkout.process');
    Route::get('/checkout/success/{transaction}', [TransactionController::class, 'orderSuccess'])->name('checkout.success');
    Route::get('/payment/finish', [TransactionController::class, 'paymentFinish'])->name('payment.finish');

    // Orders
    Route::get('/orders', [TransactionController::class, 'index'])->name('user.orders');
    Route::get('/orders/{id}', [TransactionController::class, 'show'])->name('user.order.detail');
    Route::post('/orders/{id}/complete', [TransactionController::class, 'markAsCompleted'])->name('user.order.complete');

    // Reviews
    Route::get('/orders/{id}/review', [ReviewController::class, 'create'])->name('user.review.create');
    Route::post('/orders/{id}/review', [ReviewController::class, 'store'])->name('user.review.store');
});

// Midtrans Notification Webhook (outside auth middleware)
Route::post('/midtrans/notification', [TransactionController::class, 'handleNotification'])->name('midtrans.notification');
