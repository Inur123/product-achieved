<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    // Mengambil data pengguna yang sedang login
    $user = Auth::user();

    // Menghitung total produk
    $totalProducts = Product::count();

    // Menghitung total kategori
    $totalCategories = Category::count();

    // Menghitung total transaksi
    $totalTransactions = Transaction::count();

    // Menghitung total pendapatan (total harga dari transaksi yang sudah selesai, termasuk diskon)
    $totalRevenue = Transaction::where('status', 'completed') // Menghitung hanya transaksi yang sudah selesai
        ->get()
        ->sum(function ($transaction) {
            // For each completed transaction, calculate the revenue after applying promotions
            $totalPriceAfterDiscount = 0;

            // Get the products related to the transaction
            foreach ($transaction->products as $product) {
                // Retrieve any active promotions for the product
                $promotions = Promotion::where('product_id', $product->id)
                    ->where('end_date', '>=', now())
                    ->get();

                // Get the original product price
                $productPrice = $product->harga;
                $promoPrice = $productPrice; // Default to the original price

                // Calculate the promo price (if any)
                foreach ($promotions as $promotion) {
                    if ($promotion->discount_type == 'percentage') {
                        $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
                    } else {
                        $promoPrice = $productPrice - $promotion->discount_value;
                    }
                }

                // Add the product price after discount to the total revenue
                $totalPriceAfterDiscount += $promoPrice;
            }

            return $totalPriceAfterDiscount;
        });

    // Mengembalikan view dashboard dengan data user, total produk, total kategori, total transaksi, dan total pendapatan
    return view('backend.dashboard', [
        'user' => $user,
        'totalProducts' => $totalProducts,
        'totalCategories' => $totalCategories,
        'totalTransactions' => $totalTransactions,
        'totalRevenue' => $totalRevenue, // Total revenue after discount
    ]);
}



}
