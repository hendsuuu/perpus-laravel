@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Postingan</h1>
    <form action="{{ route('posting.update', $posting->POSTING_ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Metode PUT untuk edit data -->

        <div class="mb-3">
            <label for="message_text" class="form-label">Message</label>
            <textarea class="form-control" id="message_text" name="message_text" rows="3" required>{{ $posting->MESSAGE_TEXT }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="message_gambar" class="form-label">Gambar (Opsional)</label>
            <input type="file" class="form-control" id="message_gambar" name="message_gambar">
            @if($posting->MESSAGE_GAMBAR)
                <img src="{{ asset('uploads/' . $posting->MESSAGE_GAMBAR) }}" alt="Current Image" class="mt-2" style="width: 150px;">
                <p>Gambar saat ini:</p>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
