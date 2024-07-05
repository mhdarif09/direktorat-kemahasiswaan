@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome to your Dashboard</h1>
    <p>This is your dashboard where you can see your details and manage your account.</p>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3 text-center custom-card" style="max-width: 18rem;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="fas fa-file-alt fa-3x mb-3"></i>
                    <h5 class="card-title">Total Articles</h5>
                    <h1>{{ $totalArticles }}</h1>
                    <p class="card-text">Total number of articles posted.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
