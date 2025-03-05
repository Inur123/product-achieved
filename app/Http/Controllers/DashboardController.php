<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $totalCategories = Category::count();

        // Mengembalikan view dashboard dengan data user dan total produk
        return view('backend.dashboard', ['user' => $user, 'totalProducts' => $totalProducts, 'totalCategories' => $totalCategories]);
    }
}
