<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'transactions') // Load the category and transactions relationship
        ->withCount('transactions') // Count the number of related transactions
        ->paginate(10);
        $categories = Category::all(); // Ambil semua kategori dari database

        $code_product = 'ACH-' . strtoupper(Str::random(5)); // Generate random code
        return view('backend.products.index', compact('products', 'categories', 'code_product',));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'required|numeric',
            'status' => 'required|in:active,nonactive'
        ]);

        // Membuat code_product otomatis dengan awalan "ACH-" dan 5 karakter acak
        $code_product = 'ACH-' . strtoupper(Str::random(5));

        // Menyimpan gambar jika ada
        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        // Membuat produk baru dengan category_id dan code_product otomatis
        Product::create([
            'code_product' => $code_product, // Menambahkan code_product otomatis
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'status' => $request->status
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Ambil data produk beserta relasi kategori
    $product = Product::with('category')->findOrFail($id);

    // Kembalikan data dalam format JSON
    return response()->json([
        'code_product' => $product->code_product,
        'name' => $product->name,
        'description' => $product->description,
        'harga' => $product->harga,
        'status' => $product->status,
        'image' => $product->image,
        'category' => $product->category ? $product->category->name : 'No category available', // Pastikan kategori tersedia
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        return response()->json([
            'product' => $product,
            'categories' => $categories,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code_product' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'harga' => 'required|numeric',
            'category' => 'required|exists:categories,id', // Validasi category_id
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');

        // Tambahkan category_id ke data
        $data['category_id'] = $request->input('category');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Hapus gambar dari storage jika ada
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Hapus produk dari database
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete product.'
            ]);
        }
    }
}
