<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []); // Ambil data cart dari session
            $cartCount = count($cart); // Hitung jumlah item di cart
            $view->with('cartCount', $cartCount); // Kirim variabel $cartCount ke semua view
        });

        View::composer('*', function ($view) {
            $categories = Category::all(); // Ambil semua kategori dari database
            $view->with('categories', $categories); // Kirim ke semua view
        });
    }
}
