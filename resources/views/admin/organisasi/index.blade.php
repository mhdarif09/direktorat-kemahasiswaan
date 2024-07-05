@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Organisasi</h1>
        <a href="{{ route('organisasi.create') }}" class="btn btn-primary">Tambah Organisasi</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organisasi as $org)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $org->name }}</td>
                        <td>{{ $org->description }}</td>
                        <td>
                            @if($org->image)
                                <img src="{{ Storage::url('organisasi/' . $org->image) }}" alt="Image" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('organisasi.edit', $org->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('organisasi.destroy', $org->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $organisasi->links() }}
    </div>
@endsection
