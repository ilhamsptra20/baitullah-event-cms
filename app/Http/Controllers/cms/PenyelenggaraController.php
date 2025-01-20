<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use App\Penyelenggara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data penyelenggara
        $penyelenggaras = Penyelenggara::all();

        // Tampilkan data ke view
        return view('penyelenggara.index', compact('penyelenggaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat penyelenggara baru
        return view('penyelenggara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id_users' => 'required|exists:users,id',  // Pastikan ID user valid
            'email' => 'required|email|unique:penyelenggaras,email',
            'password' => 'required|string|min:8|confirmed',
            'uuid' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'status' => 'required|boolean',
        ]);

        // Enkripsi password sebelum disimpan
        $validated['password'] = Hash::make($validated['password']);

        // Simpan data penyelenggara ke database
        Penyelenggara::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyelenggara $penyelenggara)
    {
        // Tampilkan detail penyelenggara
        return view('penyelenggara.show', compact('penyelenggara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyelenggara $penyelenggara)
    {
        // Tampilkan form edit dengan data penyelenggara
        return view('penyelenggara.edit', compact('penyelenggara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyelenggara $penyelenggara)
    {
        // Validasi data
        $validated = $request->validate([
            'id_users' => 'required|exists:users,id',
            'email' => 'required|email|unique:penyelenggaras,email,' . $penyelenggara->id_penyelenggara,
            'password' => 'nullable|string|min:8|confirmed',
            'uuid' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'status' => 'required|boolean',
        ]);

        // Jika password diisi, enkripsi dan update
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Update data penyelenggara
        $penyelenggara->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyelenggara $penyelenggara)
    {
        // Hapus data penyelenggara
        $penyelenggara->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyelenggara.index')->with('success', 'Penyelenggara berhasil dihapus.');
    }
}
