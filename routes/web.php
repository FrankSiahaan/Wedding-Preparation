<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('CheckOut.pembayaran_berhasil');
});

Route::get('/home', [ProductController::class, 'home'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

Route::post('/search', [ProductController::class, 'filter'])->name('product.filter');

Route::post('/cart', [ProductController::class, 'cart'])->name('product.cart');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'storelogin'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
