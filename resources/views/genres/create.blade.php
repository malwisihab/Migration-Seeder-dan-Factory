@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Genre Baru</h1>

        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Genre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan Genre</button>
        </form>
    </div>
@endsection
