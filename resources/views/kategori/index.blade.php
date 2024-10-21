@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Id Kategori</th>
                <th>Nama Kategori</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        {{-- <a href="{{ route('kategori.show', $kategori->id_kategori) }}" class="btn btn-info btn-sm">Detail</a> --}}
                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
