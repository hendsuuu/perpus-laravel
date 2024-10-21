@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Menu Baru</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="level">Nama Menu</label>
            <input type="text" name="level" id="id_level" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection