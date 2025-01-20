<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\CategoryEvent;
use Illuminate\Http\Request;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data kategori event
        $categories = CategoryEvent::all();

        // Tampilkan data ke view
        return view('category_event.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat kategori baru
        return view('category_event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Simpan data menggunakan model
        CategoryEvent::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('category_event.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryEvent $categoryEvent)
    {
        // Tampilkan detail kategori langsung dari model
        return view('category_event.show', compact('categoryEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryEvent $categoryEvent)
    {
        // Tampilkan form edit dengan data model yang diambil langsung
        return view('category_event.edit', compact('categoryEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryEvent $categoryEvent)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Update data kategori
        $categoryEvent->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('category_event.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryEvent $categoryEvent)
    {
        // Hapus data kategori
        $categoryEvent->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('category_event.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
