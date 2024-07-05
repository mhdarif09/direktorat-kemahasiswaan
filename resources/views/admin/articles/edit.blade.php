<!-- resources/views/admin/articles/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Article</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                