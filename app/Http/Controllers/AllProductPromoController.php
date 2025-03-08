<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;

class AllProductPromoController extends Controller
{
    public function index(Request $request)
{
    // Ambil semua kategori dari database
    $categories = Category::all();

    // Query untuk produk yang memiliki promosi masih berlaku dan statusnya aktif
    $query = Product::where('status', 'active') // Hanya produk yang aktif
        ->whereHas('promotions', function ($query) {
            $query->where('end_date', '>=', now()); // Hanya promosi yang masih berlaku
        })
        ->with(['promotions', 'category']); // Load relasi promotions dan category

    // Filter berdasarkan kategori menggunakan slug
    if ($request->has('category') && $request->category !== 'all') {
        $category = Category::where('slug', $request->category)->first(); // Cari kategori berdasarkan slug
        if ($category) {
            $query->where('category_id', $category->id); // Filter produk berdasarkan kategori
        }
    }

    // Pagination
    $products = $query->paginate(20);

    return view('all-products-promo', compact('products', 'categories'));
}

}
