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

    // Ambil semua produk yang tidak masuk ke dalam promosi dan hanya yang aktif
    $products = Product::with('category')
        ->where('status', 'active') // Hanya produk dengan status "active"
        ->get();

    // Ambil promo yang masih aktif dan hanya produk yang aktif
    $promotions = Promotion::where('end_date', '>=', Carbon::now()) // Hanya promosi yang masih berlaku
        ->whereHas('product', function ($query) {
            $query->where('status', 'active'); // Pastikan produk dalam promo juga aktif
        })
        ->with('product') // Pastikan ada relasi di model
        ->get();

    return view('home', compact('categories', 'products', 'promotions'));
}

}
