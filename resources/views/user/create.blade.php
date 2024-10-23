@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Menambahkan User</h1>

    <!-- Form untuk menambahkan user baru -->
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nama_user" class="form-label">Nama pengguna</label>
            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" name="nama_user" value="{{ old('nama_user') }}" required>
            @error('nama_user')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Pengguna</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status_user" class="form-label">Status User</label>
            <input type="text" class="form-control @error('status_user') is-invalid @enderror" id="status_user" name="status_user" value="{{ old('status_user') }}" required>
            @error('status_user')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="id_jenis_user">Select Jenis User</label>
            <select name="id_jenis_user" id="id_jenis_user" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id_jenis_user }}">{{ $role->jenis_user }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>

       
    </form>
</div>
@endsection
