@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h6 class="mb-3">Welcome to Dashboard Admin</h6>
    <h1>Daftar User</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama</th>
                <th>Password</th>
                <th>Email</th>
                <th>Nomor Handphone</th>
                <th>Status User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->status_user }}</td>
                    <td>{{ $user->role->jenis_user }}</td> 
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a href="{{ route('user.edit', $user->id_user) }}" class="dropdown-item">Edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('user.destroy', $user->id_user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
