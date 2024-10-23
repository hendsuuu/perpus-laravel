@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Komentar</h1>

    <form action="{{ route('komentar.update', $komentar->KOMEN_ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Pilihan posting yang ada --}}
        <div class="mb-3">
            <label for="POSTING_ID" class="form-label">ID Posting</label>
            <select class="form-control @error('POSTING_ID') is-invalid @enderror" id="POSTING_ID" name="POSTING_ID" required>
                @foreach($postings as $posting)
                    <option value="{{ $posting->POSTING_ID }}" 
                        {{ $komentar->POSTING_ID == $posting->POSTING_ID ? 'selected' : '' }}>
                        {{ $posting->MESSAGE_TEXT }}
                    </option>
                @endforeach
            </select>
            @error('POSTING_ID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jika user adalah admin, bisa memilih user --}}
        @if(Auth::user()->id_jenis_user == 1) 
            <div class="mb-3">
                <label for="USER_ID" class="form-label">Pilih User</label>
                <select class="form-control @error('USER_ID') is-invalid @enderror" id="USER_ID" name="USER_ID" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id_user }}" 
                            {{ $komentar->USER_ID == $user->id_user ? 'selected' : '' }}>
                            {{ $user->nama_user }}
                        </option>
                    @endforeach
                </select>
                @error('USER_ID')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @else
            {{-- Jika role user, user_id diambil dari Auth::id() --}}
            <input type="hidden" name="USER_ID" value="{{ Auth::id() }}">
        @endif

        {{-- Input Komentar Text --}}
        <div class="mb-3">
            <label for="KOMENTAR_TEXT" class="form-label">Komentar</label>
            <textarea class="form-control @error('KOMENTAR_TEXT') is-invalid @enderror" id="KOMENTAR_TEXT" name="KOMENTAR_TEXT" required>{{ old('KOMENTAR_TEXT', $komentar->KOMENTAR_TEXT) }}</textarea>
            @error('KOMENTAR_TEXT')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection