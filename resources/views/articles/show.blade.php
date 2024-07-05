<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Direktorat Kemahasiswaan Universitas Bina Darma</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/mstile-150x150.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">

    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    <style>
        .article img {
            margin-bottom: 20px; /* Adjust the value as needed */
        }
    </style>
</head>
<body>
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="#"> 
            <img class="me-3" src="{{ asset('/img/gallery/logo.png')}}" alt="" />
            <div class="text-primary font-base">Bina Darma</div>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item"><a class="nav-link fw-medium active" aria-current="page" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#books">Books</a></li>
              <li class="nav-item"><a class="nav-link" href="#libraries">Libraries</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                </ul>
              </li>
            </ul>
            <form class="ps-lg-5" action="{{ route('login') }}">
                <button class="btn btn-lg btn-primary rounded-pill bg-gradient font-base order-0" type="submit">Login</button>
            </form>
          </div>
        </div>
      </nav>

      <!-- Section for Single Article -->
      <section class="article">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <h2>{{ $article->judul }}</h2>
                      <p class="text-muted">Author: {{ $article->author }}</p>
                      <img src="{{ asset('images/' . $article->thumbnail) }}" alt="{{ $article->judul }}">
                      <p> {!! $article->content !!}</p>
                      </p>
                      <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
                  </div>
              </div>
          </div>
      </section>

      <!-- Footer -->
      <div class="container">
          <div class="row justify-content-between pb-5 pt-8">
            <div class="col-12 col-lg-auto mb-5 mb-lg-0"><a class="d-flex align-items-center fw-semi-bold fs-3" href="#"> <img class="me-3" src="{{ asset('img/gallery/logo.png') }}" alt= />
                <div class="text-primary font-base">Bina Darma</div>
              </a></div>
            <div class="col-auto mb-3">
              <h6 class="mb-5 font-base fs-1">About us </h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Vision</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Careers</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Blog</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Terms of Service</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Donate</a></li>
              </ul>
            </div>
            <div class="col-auto mb-3">
              <h6 class="mb-5 font-base fs-1">Discover </h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Home</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Books</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Authors</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Subjects</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Advanced Search</a></li>
              </ul>
            </div>
            <div class="col-auto mb-3">
              <h6 class="mb-5 font-base fs-1">Develop </h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Development center</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">API Documentation</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Writing Book</a></li>
                <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Add a Book</a></li>
              </ul>
            </div>
          <div class="row flex-center">
            <div class="col-auto mb-2">
              <p class="mb-0 fs--1 my-2 text-center">&copy; This template is made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#723182" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-700" href="https://themewagon.com/" target="_blank">Themewagon </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </main>
</body>
</html>
