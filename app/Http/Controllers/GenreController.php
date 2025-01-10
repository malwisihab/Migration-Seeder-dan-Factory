<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();  // Mengambil semua genre
        return view('genres.index', compact('genres')); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');  // Menampilkan form tambah genre
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = new Genre();
        $genre->name = $request->input('name');
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);  // Mencari genre berdasarkan ID
        return view('genres.edit', compact('genre')); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Cari genre berdasarkan ID
        $genre = Genre::findOrFail($id);
        // Update nama genre dengan input dari request
        $genre->name = $request->input('name');
        $genre->save();  // Simpan perubahan genre
    
        // Redirect kembali ke daftar genre dengan pesan sukses
        return redirect()->route('genres.index')->with('success', 'Genre berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre berhasil dihapus!'); //
    }
}
