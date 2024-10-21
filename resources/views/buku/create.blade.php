@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Buku Baru</h1>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode Buku</label>
            <input type="text" name="kode" id="kode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
