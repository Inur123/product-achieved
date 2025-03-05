<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard'); // Sesuaikan dengan halaman dashboard Anda
    })->name('dashboard');
});
