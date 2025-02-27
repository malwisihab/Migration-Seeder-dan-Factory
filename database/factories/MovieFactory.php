<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Menampilkan daftar film
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    // Menampilkan form untuk membuat film baru
    public function create()
    {
        $genres = Genre::all(); // Ambil semua genre
        return view('movies.create', compact('genres'));
    }

    // Menyimpan film baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'year' => 'required|integer',
            'genre_id' => 'required|uuid|exists:genres,id',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload if there's a poster
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movie::create($data);

        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit film
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    // Mengupdate data film
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'year' => 'required|integer',
            'genre_id' => 'required|uuid|exists:genres,id',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload if there's a poster
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($data);

        return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui');
    }

    // Menghapus film
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus');
    }
}
