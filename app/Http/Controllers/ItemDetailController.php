<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ItemDetailController extends Controller
{
    public function index($slug)
    {
        // Cari produk berdasarkan slug
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();

        // Ambil promo aktif
        $promotions = Promotion::where('end_date', '>=', Carbon::now())
            ->with('product')
            ->get();

        return view('detail-product', compact('product', 'promotions'));
    }

}
