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
                $totalPriceAfterDiscount = 0;

                foreach ($transaction->products as $product) {
                    $promotions = Promotion::where('product_id', $product->id)
                        ->where('end_date', '>=', now())
                        ->get();

                    $productPrice = $product->harga;
                    $promoPrice = $productPrice; // Default to the original price

                    foreach ($promotions as $promotion) {
                        if ($promotion->discount_type == 'percentage') {
                            $promoPrice = $productPrice * (1 - ($promotion->discount_value / 100));
                        } else {
                            $promoPrice = $productPrice - $promotion->discount_value;
                        }
                    }

                    $totalPriceAfterDiscount += $promoPrice;
                }

                return $totalPriceAfterDiscount;
            });

        // Get the most recent orders (limit to 5 orders for the recent orders section)
        $recentOrders = Transaction::with('products') // Assuming Transaction has a relationship with Product
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $topSellingProducts = Product::withCount('transactions')
        ->orderBy('transactions_count', 'desc')
        ->take(5)
        ->get();

        // Mengembalikan view dashboard dengan data user, total produk, total kategori, total transaksi, total pendapatan, dan recent orders
        return view('backend.dashboard', [
            'user' => $user,
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalTransactions' => $totalTransactions,
            'totalRevenue' => $totalRevenue, // Total revenue after discount
            'recentOrders' => $recentOrders, // Pass recent orders to the view
            'topSellingProducts' => $topSellingProducts,
        ]);
    }




}
