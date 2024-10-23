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
                <th>Nama Link</th>
                <th>Nama Icon</th>
                <th>Level</th>
                {{-- <th>Menu Level</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allmenus as $menu)
                <tr>
                    <td>{{ $menu->menu_id }}</td>
                    <td>{{ $menu->menu_name }}</td>
                    <td>{{ $menu->menu_link }}</td>
                    <td>{{ $menu->menu_icon }}</td>
                    <td>{{ $menu->id_level }}</td>
                    {{-- <td> --}}
                        {{-- {{ dd($menu->menuLevel[0]->level) }} --}}
                            {{-- @if($menu->menuLevel->isNotEmpty())
                                {{ $menu->menuLevel ? $menu->menuLevel[0]->level : 'Level tidak tersedia' }}
                            @else
                                Level tidak tersedia
                            @endif --}}
                    {{-- </td> --}}
                    <td>
                           <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('menu.edit', $menu->menu_id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('menu.destroy', $menu->menu_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
