<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function showCategory($slug)
    {
        // Ambil kategori berdasarkan slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Ambil produk yang hanya termasuk dalam kategori tersebut
        $products = $category->products()->paginate(12);

        return view('category-products', compact('category', 'products'));
    }

}
