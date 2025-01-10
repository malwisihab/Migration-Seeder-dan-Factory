@extends('layouts.app')

@section('content')
    <h1>Daftar Film</h1>

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Tambah Film</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Sinopsis</th>
                <th>Tahun Rilis</th>
                <th>Genre</th>
                <th>Poster</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ \Str::limit($movie->synopsis, 100) }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>
                        @if($movie->poster)
                            <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" width="50">
                        @else
                            No Poster
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus film ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
