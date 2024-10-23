@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Daftar Komentar</h1>
    <a href="{{ route('komentar.create') }}" class="btn btn-primary mb-3">Tambah Komentar Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Id Komentar</th>
                <th>Id Posting</th>
                <th>Nama User</th>
                <th>Isi Komentar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komentars as $komentar)
                <tr>
                    <td>{{ $komentar->KOMEN_ID }}</td>
                    <td>{{ $komentar->POSTING_ID }}</td>
                    <td>{{ $komentar->user->nama_user ?? 'User tidak tersedia' }}</td> <!-- Relasi ke User -->
                    <td>{{ $komentar->KOMENTAR_TEXT }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a href="{{ route('komentar.edit', $komentar->KOMEN_ID) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('komentar.destroy', $komentar->KOMEN_ID) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
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
