<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori dari database
        $categories = Category::all();

        $query = Product::with(['promotions' => function ($query) {
            $query->where('end_date', '>=', now()); // Hanya promosi yang masih berlaku
        }])
        ->where('status', 'active'); // Hanya produk yang statusnya "active"

        // Filter berdasarkan kategori menggunakan slug
        if ($request->has('category') && $request->category !== 'all') {
            $category = Category::where('slug', $request->category)->first(); // Cari kategori berdasarkan slug
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->paginate(20);

        return view('all-products', compact('products', 'categories'));
    }

}
