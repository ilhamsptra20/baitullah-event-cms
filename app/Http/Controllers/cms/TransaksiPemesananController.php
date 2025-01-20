<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use App\TransaksiPemesanan;
use Illuminate\Http\Request;

class TransaksiPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data transaksi pemesanan
        $transaksiPemesanan = TransaksiPemesanan::all();

        // Tampilkan data ke view
        return view('transaksi-pemesanan.index', compact('transaksiPemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat transaksi pemesanan baru
        return view('transaksi-pemesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'no_pemesanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        // Simpan data transaksi pemesanan ke database
        TransaksiPemesanan::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi-pemesanan.index')->with('success', 'Transaksi Pemesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiPemesanan $transaksiPemesanan)
    {
        // Tampilkan detail transaksi pemesanan
        return view('transaksi-pemesanan.show', compact('transaksiPemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiPemesanan $transaksiPemesanan)
    {
        // Tampilkan form edit dengan data transaksi pemesanan
        return view('transaksi-pemesanan.edit', compact('transaksiPemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiPemesanan $transaksiPemesanan)
    {
        // Validasi data
        $validated = $request->validate([
            'no_pemesanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        // Update data transaksi pemesanan
        $transaksiPemesanan->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi-pemesanan.index')->with('success', 'Transaksi Pemesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiPemesanan $transaksiPemesanan)
    {
        // Hapus data transaksi pemesanan
        $transaksiPemesanan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi-pemesanan.index')->with('success', 'Transaksi Pemesanan berhasil dihapus.');
    }
}
