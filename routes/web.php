<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ItemDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminTransactionController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [ItemDetailController::class, 'index'])->name('item-detail');


Route::prefix('transaction')->name('transaction.')->group(function () {
    // Checkout route
    Route::get('/{product}/checkout', [TransactionController::class, 'checkout'])->name('checkout');

    // Store route for completing a purchase
    Route::post('/complete-purchase', [TransactionController::class, 'store'])->name('complete.purchase');

    // Pending transaction route
    Route::get('/{transaction_code}', [TransactionController::class, 'pending'])->name('pending');

    // Success transaction route
    Route::get('/success/{transaction_code}', [TransactionController::class, 'success'])->name('success');
});

// Routes for checking a transaction
Route::prefix('cek-transaksi')->name('transactions.')->group(function () {
    // Display the form to enter the transaction ID
    Route::get('/', [TransactionController::class, 'cekTransactionForm'])->name('cek.form');

    // Handle form submission to check the transaction
    Route::post('/', [TransactionController::class, 'cekTransaction'])->name('cek');
});

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get('/', [AdminTransactionController::class, 'index'])->name('index');
});



// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('promotions', PromotionController::class);
});

