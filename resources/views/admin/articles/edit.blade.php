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
                            <label for="judul">Title</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $article->judul) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
                            @if ($article->thumbnail)
                                <img src="{{ asset('images/' . $article->thumbnail) }}" alt="Thumbnail" style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $article->author) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date_publish">Publish Date</label>
                            <input type="date" name="date_publish" id="date_publish" class="form-control" value="{{ old('date_publish', $article->date_publish) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
