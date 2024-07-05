<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <a href="{{ route('dashboard') }}">Direktorat Kemahasiswaan</a>
            </div>
            <div class="navbar-toggle">
                <button class="toggle-btn">
                    <span class="toggle-icon"></span>
                    <span class="toggle-icon"></span>
                    <span class="toggle-icon"></span>
                </button>
            </div>
        </div>
        <div class="navbar-nav">
            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn"><i class="fas fa-newspaper"></i> Artikel Saya</a>
                    <div class="dropdown-content">
                        <a href="{{ route('admin.articles.index') }}"><i class="fas fa-plus-circle"></i> Tambah Artikel</a>
                        <a href="#"><i class="fas fa-edit"></i> Edit Artikel</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn"><i class="fas fa-users"></i> Organisasi</a>
                    <div class="dropdown-content">
                        <a href="{{ route('organisasi.create') }}"><i class="fas fa-plus-circle"></i> Tambah Organisasi</a>
                        <a href="{{ route('organisasi.index') }}"><i class="fas fa-list"></i> Daftar Organisasi</a>
                    </div>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="mobile-menu">
        <ul class="mobile-nav-links">
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn"><i class="fas fa-newspaper"></i> Artikel</a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('admin.articles.index') }}"><i class="fas fa-plus-circle"></i> Tambah Artikel</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn"><i class="fas fa-users"></i> Organisasi</a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('organisasi.create') }}"><i class="fas fa-plus-circle"></i> Tambah Organisasi</a></li>
                    <li><a href="{{ route('organisasi.index') }}"><i class="fas fa-list"></i> Daftar Organisasi</a></li>
                </ul>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const toggleBtn = document.querySelector('.toggle-btn');
        const mobileMenu = document.querySelector('.mobile-menu');

        toggleBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
    </script>
    
    @yield('scripts')
</body>

</html>
