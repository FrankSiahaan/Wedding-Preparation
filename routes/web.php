<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\VendorController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

// Vendor Routes
Route::get('/vendor/{id}', [VendorController::class, 'show'])->name('vendor.show');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Home
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
    Route::post('/checkout/payment', [TransactionController::class, 'checkoutPayment'])->name('checkout.payment');
    Route::post('/checkout/confirmation', [TransactionController::class, 'checkoutConfirmation'])->name('checkout.confirmation');
    Route::post('/checkout/process', [TransactionController::class, 'processOrder'])->name('checkout.process');
    Route::get('/checkout/success/{transaction}', [TransactionController::class, 'orderSuccess'])->name('checkout.success');

    // Orders
    Route::get('/orders', [TransactionController::class, 'index'])->name('user.orders');
    Route::get('/orders/{id}', [TransactionController::class, 'show'])->name('user.order.detail');
});
