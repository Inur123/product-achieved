<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/detail-product', function () {
    return view('detail-product');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/cek-transaksi', function () {
    return view('cek-transaksi');
});
