@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-height: 80vh; overflow-y: auto;">
    <h1>Daftar Menu</h1>
    <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Tambah Menu Baru</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Id Menu</th>
                <th>Nama Menu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id_level }}</td>
                    <td>{{ $menu->level }}</td>
                    <td>
                        <li>
                            <form action="{{ route('menu.destroy', $menu->id_level) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
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
