@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Komentar Baru</h1>

    <form action="{{ route('komentar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
                <label for="user_id" class="form-label">ID Posting</label>
                <select class="form-control @error('POSTING_ID') is-invalid @enderror" id="POSTING_ID" name="POSTING_ID" value="{{ old('POSTING_ID') }}" required>
                    @foreach($postings as $posting)
                        <option value="{{ $posting->POSTING_ID }}">{{ $posting->MESSAGE_TEXT }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        @if(Auth::user()->id_jenis_user == 1) 
            <div class="mb-3">
                <label for="user_id" class="form-label">Pilih User</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="USER_ID" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id_user }}">{{ $user->nama_user }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @else
            {{-- Jika role user, user_id diambil dari Auth::id() --}}
            <input type="hidden" name="USER_ID" value="{{ Auth::id() }}">
        @endif

        <div class="mb-3">
            <label for="KOMENTAR_TEXT" class="form-label">Komentar</label>
            <textarea class="form-control @error('KOMENTAR_TEXT') is-invalid @enderror" id="KOMENTAR_TEXT" name="KOMENTAR_TEXT" required>{{ old('KOMENTAR_TEXT') }}</textarea>
            @error('KOMENTAR_TEXT')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
