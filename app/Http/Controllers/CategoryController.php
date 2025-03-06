<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        // Tidak diperlukan jika menggunakan API
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string', // Pastikan icon dikirim dalam format teks

        ]);

        $category = Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }


    public function edit(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string', // Pastikan icon dikirim dalam format teks
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }


    public function destroy(Category $category)
    {
        try {
            // Hapus produk dari database
            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category.'
            ]);
        }
    }
}
