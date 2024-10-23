@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Daftar Role User</h1>
    <a href="{{ route('role.create') }}" class="btn btn-primary mb-3">Tambah Role Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Id Role</th>
                <th>Nama Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id_jenis_user }}</td>
                    <td>{{ $role->jenis_user }}</td>
                    <td>
                        
                        <a href="{{ route('role.edit', $role->id_jenis_user) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('role.destroy', $role->id_jenis_user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
