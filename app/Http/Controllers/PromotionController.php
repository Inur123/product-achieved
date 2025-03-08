<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::with('product')->paginate(10);

        // Ambil hanya produk yang belum memiliki promo
        $products = Product::whereDoesntHave('promotions')->get(['id', 'name', 'harga']);

        return view('backend.promotions.index', compact('promotions', 'products'));
    }


    public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'discount_type' => 'required|in:percentage,fixed',
        'discount_value' => 'required|numeric|min:0',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Check if the product already has an active promotion
    $existingPromotion = Promotion::where('product_id', $request->product_id)
        ->where('end_date', '>=', now()) // Check if the promotion is still active
        ->first();

    if ($existingPromotion) {
        return redirect()->back()->with('error', 'This product already has an active promotion.');
    }

    // Get the product details
    $product = Product::findOrFail($request->product_id);

    // Create the promotion
    $promotion = Promotion::create([
        'product_id'     => $request->product_id,
        'discount_type'  => $request->discount_type,
        'discount_value' => $request->discount_value,
        'start_date'     => $request->start_date,
        'end_date'       => $request->end_date,
        'original_price' => $product->harga,
    ]);

    // Update the status based on the current date and the promotion's start and end dates
    $promotion->updateStatus();

    // Redirect with success message
    return redirect()->route('promotions.index')->with('success', 'Promotion created successfully.');
}



    public function edit(Promotion $promotion)
    {
        $products = Product::all(['id', 'name', 'harga']);
        return view('backend.promotions.index', compact('promotion', 'products'));
    }

    public function update(Request $request, Promotion $promotion)
{
    // Validate incoming request
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'discount_type' => 'required|in:percentage,fixed',
        'discount_value' => 'required|numeric|min:0',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Update the promotion with the validated data
    $promotion->update($request->all());

    // Update the status based on the current date and the promotion's start and end dates
    $promotion->updateStatus();

    // Redirect with success message
    return redirect()->route('promotions.index')->with('success', 'Promotion updated successfully.');
}


    public function destroy(Promotion $promotion)
    {
        try {
            // Hapus produk dari database
            $promotion->delete();

            return response()->json([
                'success' => true,
                'message' => 'Promotion deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category.'
            ]);
        }
    }
}
