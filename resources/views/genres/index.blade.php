@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Genre</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Tambah Genre</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
