<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use App\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data tiket
        $tiket = Tiket::all();

        // Tampilkan data ke view
        return view('tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat tiket baru
        return view('tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id_event' => 'required|exists:events,id_event', // Pastikan ID event valid
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'end_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        // Simpan data tiket ke database
        Tiket::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        // Tampilkan detail tiket
        return view('tiket.show', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        // Tampilkan form edit dengan data tiket
        return view('tiket.edit', compact('tiket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        // Validasi data
        $validated = $request->validate([
            'id_event' => 'required|exists:events,id_event',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'end_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        // Update data tiket
        $tiket->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        // Hapus data tiket
        $tiket->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
