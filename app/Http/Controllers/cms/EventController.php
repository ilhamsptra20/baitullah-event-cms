<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Event;
use App\CategoryEvent;
use App\Penyelenggara;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data event dengan relasi kategori dan penyelenggara
        $events = Event::with(['category', 'penyelenggara'])->get();

        // Tampilkan data ke view
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data kategori dan penyelenggara untuk dropdown
        $categories = CategoryEvent::all();
        $penyelenggaras = Penyelenggara::all();

        // Tampilkan form untuk membuat event baru
        return view('event.create', compact('categories', 'penyelenggaras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id_event_category' => 'required|exists:tabel_event_category,id_event_category',
            'id_penyelenggara' => 'required|exists:tabel_penyelenggara,id_penyelenggara',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'slug' => 'required|string|unique:tabel_event,slug',
            'status' => 'required|boolean',
        ]);

        // Simpan data ke database
        Event::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Tampilkan detail event dengan relasi
        $event->load(['category', 'penyelenggara', 'tiket']);

        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Ambil data kategori dan penyelenggara untuk dropdown
        $categories = CategoryEvent::all();
        $penyelenggaras = Penyelenggara::all();

        // Tampilkan form edit dengan data event
        return view('event.edit', compact('event', 'categories', 'penyelenggaras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Validasi data
        $validated = $request->validate([
            'id_event_category' => 'required|exists:tabel_event_category,id_event_category',
            'id_penyelenggara' => 'required|exists:tabel_penyelenggara,id_penyelenggara',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'slug' => 'required|string|unique:tabel_event,slug,' . $event->id_event . ',id_event',
            'status' => 'required|boolean',
        ]);

        // Update data event
        $event->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Hapus event dari database
        $event->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }
}
