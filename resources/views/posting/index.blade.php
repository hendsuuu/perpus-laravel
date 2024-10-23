@extends('layouts.app')

@section('content')
<style>
    .no-rounded {
        border-radius: 0;
        width: 100px; /* Atur sesuai kebutuhan */
        /* Tambahkan properti lain jika diperlukan */
    }
    .table td img {
        width: 150px !important;
        height: auto !important; /* Atur sesuai keinginan */
        border-radius: 0;
    }
</style>
<div class="container mt-4">
    <h1>Daftar Postingan</h1>
    <a href="{{ route('posting.add') }}" class="btn btn-primary mb-3">Tambah Postingan Baru</a>
     <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Text</th>
                <th>Image</th>
                <th>Likes</th>
                <th>Kommen</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postings as $posting)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $posting->MESSAGE_TEXT }}</td>
                <td>
                   @if($posting->MESSAGE_GAMBAR)
                        <img class="no-rounded" src="{{ asset('uploads/' . $posting->MESSAGE_GAMBAR) }}" alt="Post Image">
                    @endif
                </td>
                <td>{{ $posting->likes->count() }} Likes</td>
                <td>{{ $posting->comments->count() }} Komentar</td>
                <td>
                    <!-- Action Buttons -->
                    <a href="{{ route('posting.edit', $posting->POSTING_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('posting.delete', $posting->POSTING_ID) }}" method="POST" style="display:inline;">
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