<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil semua produk yang tidak masuk ke dalam promosi
        $products = Product::with('category')->get();

        // Ambil promo yang masih aktif
        $promotions = Promotion::where('end_date', '>=', Carbon::now()) // Menggunakan Carbon
            ->with('product') // Pastikan ada relasi di model
            ->get();

        return view('home', compact('categories', 'products', 'promotions'));
    }
}
