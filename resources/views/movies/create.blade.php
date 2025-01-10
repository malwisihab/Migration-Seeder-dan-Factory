@extends('layouts.app')

@section('content')
    <h1>Edit Film</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Film</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="4" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun Rilis</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $movie->year) }}" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" class="form-control" id="poster" name="poster">
            @if($movie->poster)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster {{ $movie->title }}" class="img-thumbnail" width="150">
                    <p class="text-muted">Poster Saat Ini</p>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Perbarui Film</button>
    </form>
@endsection
