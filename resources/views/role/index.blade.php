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
                        <li>
                            <form action="{{ route('role.destroy', $role->id_jenis_user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger">Hapus</button>
                            </form>
                        </li>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
