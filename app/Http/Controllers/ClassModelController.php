<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    /**
     * Menampilkan semua data kelas.
     */
    public function index()
    {
        $classes = ClassModel::paginate(10); // Paginasi 10 item per halaman
        return view('backend.classes.index', compact('classes'));
    }

    /**
     * Menampilkan form untuk membuat kelas baru (opsional, jika ingin halaman terpisah).
     */
    public function create()
    {
        return view('backend.classes.create');
    }

    /**
     * Menyimpan data kelas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,nonactive',
        ]);

        ClassModel::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Menampilkan detail satu data kelas berdasarkan ID (untuk AJAX).
     */
    public function show($id)
    {
        $class = ClassModel::findOrFail($id);
        return response()->json($class);
    }

    /**
     * Menampilkan data kelas untuk form edit (untuk AJAX).
     */
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        return response()->json([
            'class' => $class
        ]);
    }

    /**
     * Mengupdate data kelas berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,nonactive',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class updated successfully.');
    }

    /**
     * Menghapus data kelas berdasarkan ID.
     */
    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return response()->json([
            'message' => 'Class deleted successfully.',
            'success' => true
        ]);
    }
}
