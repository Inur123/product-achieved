<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ItemDetailController extends Controller
{
    public function index($id) // Passing product ID to the method
    {
        // Retrieve the product based on the ID
        $product = Product::with('category')->findOrFail($id);

        // Retrieve active promotions
        $promotions = Promotion::where('end_date', '>=', Carbon::now())
            ->with('product')
            ->get();

        // Pass the product and promotions data to the view
        return view('detail-product', compact('product', 'promotions'));
    }
}
