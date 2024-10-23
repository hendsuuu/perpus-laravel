@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container mt-4">
    <h1>Tambah Menu Baru</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="menu_name">Nama Menu</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ old('menu_name') }}" required>
            @error('menu_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="menu_link">Menu Link</label>
            <input type="text" name="menu_link" id="menu_link" class="form-control" value="{{ old('menu_link') }}" required>
            @error('menu_link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="menu_icon">Menu Icon</label>
            <input type="text" name="menu_icon" id="menu_icon" class="form-control" value="{{ old('menu_icon') }}" required>
            @error('menu_icon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="id_level">Level Menu</label>
            <select name="id_level" id="id_level" class="form-control" required>
                <option value="" disabled selected>Pilih Level</option> <!-- Opsi default -->
                @foreach($levels as $level)
                    <option value="{{ $level->id_level }}" {{ old('id_level') == $level->id_level ? 'selected' : '' }}>{{ $level->level }}</option>
                @endforeach
            </select>
            @error('id_level')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
