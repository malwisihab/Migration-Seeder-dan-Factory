@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Genre</h1>

        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Ini digunakan untuk metode PUT untuk update data -->

            <div class="form-group">
                <label for="name">Nama Genre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Genre</button>
        </form>
    </div>
@endsection
