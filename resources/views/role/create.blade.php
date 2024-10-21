@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Jenis Role Baru</h1>
    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Role</label>
            <input type="text" name="jenis_user" id="id_jenis_user" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection