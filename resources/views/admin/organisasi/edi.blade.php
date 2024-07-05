@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Organisasi</h1>
        <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ $organisasi->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" required>{{ $organisasi->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" class="form-control">
                @if($organisasi->image)
                    <img src="{{ Storage::url('organisasi/' . $organisasi->image) }}" alt="Current Image" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
