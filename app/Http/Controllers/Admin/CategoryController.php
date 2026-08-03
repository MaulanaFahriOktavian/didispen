<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DispensationCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Tampilkan daftar kategori
     */
    public function index()
    {
        $categories = DispensationCategory::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dispensation_categories,name',
            'description' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        DispensationCategory::create($validated);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Update kategori
     */
    public function update(Request $request, DispensationCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:dispensation_categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $category->update($validated);

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Hapus kategori (soft delete)
     */
    public function destroy(DispensationCategory $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }

    /**
     * Bulk delete
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:dispensation_categories,id',
        ]);

        DispensationCategory::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', count($request->ids) . ' kategori berhasil dihapus!');
    }
}