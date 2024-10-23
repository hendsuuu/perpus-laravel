@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Role</h1>
    <form action="{{ route('role.update', $role->id_jenis_user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="jenis_user">Nama Role</label>
            <input type="text" name="jenis_user" id="jenis_user" class="form-control" value="{{ old('jenis_user', $role->jenis_user) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('role.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
