<?php

namespace App\Http\Controllers;

use App\Models\CastMovie;
use App\Models\Movie;
use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the cast.
     */
    public function index()
    {
        // Menampilkan semua CastMovie yang ada
        $castMovies = CastMovie::all();
        return view('cast.index', compact('castMovies'));
    }

    /**
     * Show the form for creating a new cast.
     */
    public function create()
    {
        // Mengambil data film dan cast untuk ditampilkan di form create
        $movies = Movie::all();
        $casts = Cast::all();
        return view('cast.create', compact('movies', 'casts'));
    }

    /**
     * Store a newly created cast in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'movie_id' => 'required|uuid|exists:movies,id',
            'cast_id' => 'required|uuid|exists:casts,id',
            'role' => 'required|string|max:255',
        ]);

        // Menyimpan data CastMovie baru
        CastMovie::create($request->all());

        return redirect()->route('cast.index')->with('success', 'Cast berhasil ditambahkan');
    }

    /**
     * Display the specified cast.
     */
    public function show(CastMovie $castMovie)
    {
        // Menampilkan data CastMovie tertentu
        return view('cast.show', compact('castMovie'));
    }

    /**
     * Show the form for editing the specified cast.
     */
    public function edit(CastMovie $castMovie)
    {
        // Mengambil data film dan cast untuk form edit
        $movies = Movie::all();
        $casts = Cast::all();
        return view('cast.edit', compact('castMovie', 'movies', 'casts'));
    }

    /**
     * Update the specified cast in storage.
     */
    public function update(Request $request, CastMovie $castMovie)
    {
        // Validasi input
        $request->validate([
            'movie_id' => 'required|uuid|exists:movies,id',
            'cast_id' => 'required|uuid|exists:casts,id',
            'role' => 'required|string|max:255',
        ]);

        // Update CastMovie
        $castMovie->update($request->all());

        return redirect()->route('cast.index')->with('success', 'Cast berhasil diperbarui');
    }

    /**
     * Remove the specified cast from storage.
     */
    public function destroy(CastMovie $castMovie)
    {
        // Menghapus CastMovie
        $castMovie->delete();
        return redirect()->route('cast.index')->with('success', 'Cast berhasil dihapus');
    }
}
