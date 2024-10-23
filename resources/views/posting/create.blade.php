@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Postingan Baru</h1>
     <form action="{{ route('posting.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="message_text" rows="3" placeholder="What's on your mind?" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="message_gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
</div>
@endsection