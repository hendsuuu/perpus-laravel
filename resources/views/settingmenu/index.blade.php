@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h6 class="mb-3">Welcome to Dashboard Admin</h6>
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
                <tr>
                    <td>{{ $buku->kode }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->kategori->nama_kategori }}</td> 
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a href="{{ route('buku.edit', $buku->idbuku) }}" class="dropdown-item">Edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('buku.destroy', $buku->idbuku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
