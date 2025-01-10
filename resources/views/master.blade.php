@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-primary">Daftar Film</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Film
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre ? $movie->genre->name : 'Genre Tidak Tersedia' }}</td>
                        <td>{{ Str::limit($movie->description, 50) }}</td>
                        <td>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus film ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada film yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
