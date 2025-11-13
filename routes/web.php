<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vendor.pembayaran');
});

Route::get('/alamat', function () {
    return view('vendor.alamat_pengiriman');
});

Route::get('/checkout', function () {
    return view('vendor.checkout');
});

Route::get('/konfirmasi', function () {
    return view('vendor.pembayaran_berhasil');
});
