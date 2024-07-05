<!-- resources/views/admin/articles/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Article List</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date Publish</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->judul }}</td>
                                    <td>{{ $article->author }}</td>
                                    <td>{{ $article->date_publish }}</td>
                                    <td>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger" onclick="deleteArticle({{ $article->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk konfirmasi penghapusan -->
<script>
    function deleteArticle(id) {
        if (confirm("Are you sure you want to delete this article?")) {
            // Form action untuk menghapus artikel
            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', '/articles/' + id);
            form.style.display = 'hidden';
            document.body.appendChild(form);

            // CSRF token
            var csrfField = document.createElement('input');
            csrfField.setAttribute('type', 'hidden');
            csrfField.setAttribute('name', '_token');
            csrfField.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfField);

            // Method DELETE
            var methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'DELETE');
            form.appendChild(methodField);

            form.submit();
        }
    }
</script>
@endsection
