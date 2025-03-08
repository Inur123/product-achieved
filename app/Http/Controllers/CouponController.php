<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::with('products')->paginate(10); // Eager load products
        $products = Product::all(); // Ambil semua produk
        return view('backend.coupons.index', compact('coupons', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'name' => 'required',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'limit' => 'nullable|integer|min:0',
            'products' => 'nullable|array'
        ]);

        // Create coupon, without 'products'
        $coupon = Coupon::create($request->except('products'));

        // Sync products if provided
        if ($request->has('products')) {
            $coupon->products()->sync($request->input('products'));
        }

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        // Eager load the 'products' relationship
        $coupon = Coupon::with('products')->findOrFail($id);
        $products = Product::all(); // Ambil semua produk
        return view('backend.coupons.index', compact('coupon', 'products'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code,' . $id,
            'name' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'limit' => 'nullable|integer',
            'products' => 'nullable|array', // Ensures 'products' is treated as an array
        ]);

        // Update the coupon data
        $coupon->update($request->only(['code', 'name', 'discount_type', 'discount_value', 'status', 'limit']));

        // Sync the products if they exist
        if ($request->has('products')) {
            // Cast 'products' to an array and sync with related products
            $coupon->products()->sync($request->input('products'));
        } else {
            // If no products are selected, clear the current product associations
            $coupon->products()->sync([]);
        }

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
