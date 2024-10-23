@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Daftar Like</h1>
    <a href="{{ route('like.create') }}" class="btn btn-primary mb-3">Tambah Like Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Id Like</th>
                <th>Id Posting</th>
                <th>Nama User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($likes as $like)
                <tr>
                    <td>{{ $like->LIKE_ID }}</td>
                    <td>{{ $like->POSTING_ID }}</td>
                    <td>{{ $like->user->nama_user ?? 'User tidak tersedia' }}</td> <!-- Relasi ke User -->
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a href="{{ route('like.edit', $like->LIKE_ID) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('like.destroy', $like->LIKE_ID) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus Like ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
