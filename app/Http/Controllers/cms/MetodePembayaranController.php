<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use App\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data metode pembayaran
        $metodePembayarans = MetodePembayaran::all();

        // Tampilkan data ke view
        return view('pages.payment_method.index', compact('metodePembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat metode pembayaran baru
        return view('pages.payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tutorial' => 'nullable|string',
        //     'key_value' => 'required|string|max:255',
        //     'order_by' => 'required|integer',
        //     'author' => 'required|string|max:255',
        //     'status' => 'required|boolean',
        ]);

        // Simpan data ke database
        MetodePembayaran::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('payment_method.index')->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        // Tampilkan detail metode pembayaran
        return view('payment_method.show', compact('metodePembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodePembayaran $metodePembayaran)
    {
        // Tampilkan form edit dengan data metode pembayaran
        return view('payment_method.edit', compact('metodePembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tutorial' => 'nullable|string',
            'key_value' => 'required|string|max:255',
            'order_by' => 'required|integer',
            'author' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Update data metode pembayaran
        $metodePembayaran->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('payment_method.index')->with('success', 'Metode pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodePembayaran $metodePembayaran)
    {
        // Hapus data metode pembayaran
        $metodePembayaran->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('payment_method.index')->with('success', 'Metode pembayaran berhasil dihapus.');
    }
}
