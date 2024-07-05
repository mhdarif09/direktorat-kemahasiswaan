<!-- resources/views/articles/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <span>Articles</span>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-success">Add Article</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->judul }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->date_publish }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
