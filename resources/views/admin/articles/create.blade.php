@extends('layouts.app')

@section('title', 'Add Article')

@section('content')
<div class="container">
    <h1>Add Article</h1>
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_publish">Date Publish:</label>
            <input type="date" name="date_publish" id="date_publish" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" placeholder="Enter the Description" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Article</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
