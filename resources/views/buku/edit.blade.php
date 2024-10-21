@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Buku</h1>

    <!-- Form untuk mengedit buku -->
    <form action="{{ route('buku.edit', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Buku</label>
            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $buku->kode) }}" required>
            @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang Buku</label>
            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
            @error('pengarang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori Buku</label>
            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                <option value="" disabled>Select Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == old('id_kategori', $buku->id_kategori) ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Buku</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
