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
    <h1>Edit Menu</h1>
    <form action="{{ route('menu.update', $menu->menu_id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menunjukkan bahwa ini adalah permintaan PUT untuk pembaruan -->
        
        <div class="form-group">
            <label for="menu_name">Nama Menu</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ old('menu_name', $menu->menu_name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="menu_link">Menu Link</label>
            <input type="text" name="menu_link" id="menu_link" class="form-control" value="{{ old('menu_link', $menu->menu_link) }}" required>
        </div>
        
        <div class="form-group">
            <label for="menu_icon">Menu Icon</label>
            <input type="text" name="menu_icon" id="menu_icon" class="form-control" value="{{ old('menu_icon', $menu->menu_icon) }}" required>
        </div>
        
        <div class="form-group">
            <label for="id_level">Level Menu</label>
            <select name="id_level" id="id_level" class="form-control" required>
                <option value="" disabled>Pilih Level</option> <!-- Opsi default -->
                @foreach($menuLevels as $level)
                    <option value="{{ $level->id_level }}" {{ $level->id_level == $menu->id_level ? 'selected' : '' }}>
                        {{ $level->level }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
