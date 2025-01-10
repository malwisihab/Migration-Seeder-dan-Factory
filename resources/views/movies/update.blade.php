@extends('layouts.app')

@section('content')
    <h1>Edit Film</h1>

    <form action="{{ route('movies.update', $movies->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($movie))
        @method('PUT') <!-- Untuk update -->
    @endif
 
    <div class="mb-3">
        <label for="title" class="form-label">Judul Film</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $movie->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="synopsis" class="form-label">Sinopsis</label>
        <textarea name="synopsis" id="synopsis" class="form-control" rows="4" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="poster" class="form-label">Poster</label>
        <input type="file" name="poster" id="poster" class="form-control">
        @if($movie->poster)
            <p class="mt-2">Poster saat ini: <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" width="100"></p>
        @endif
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Tahun Rilis</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $movie->year) }}" required>
    </div>

    <div class="mb-3">
        <label for="genre_id" class="form-label">Genre</label>
        <select name="genre_id" id="genre_id" class="form-select" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $genre->id == old('genre_id', $movie->genre_id) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="available" id="available" class="form-check-input" {{ old('available', $movie->available) ? 'checked' : '' }}>
        <label for="available" class="form-check-label">Tersedia</label>
    </div>

    <button type="submit" class="btn btn-primary">Update Film</button>
</form>

@endsection
