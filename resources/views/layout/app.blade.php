<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKA Dev - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <!-- Sidebar -->
<nav class="sidebar bg-dark text-white p-3">
    <h4 class="text-center mb-4">SKA Dev</h4>
    <ul class="nav flex-column">

        <!-- Dashboard Section -->
        <li class="nav-item sidebar-title mb-2 mt-3">Dashboard</li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.dashboard')}}" class="nav-link text-white"><i class="fas fa-home"></i> Dashboard</a>
        </li>

        <!-- Master Section -->
        <li class="nav-item sidebar-title mb-2 mt-3">Master</li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.article')}}" class="nav-link {{ request()->routeIs('admin.article') ? 'active' : 'text-white' }}">
                <i class="fas fa-newspaper"></i> Article
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.produk.index')}}" class="nav-link {{ request()->routeIs('admin.produk') ? 'active' : 'text-white' }}">
                <i class="fas fa-puzzle-piece"></i> Produk
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('admin.galeri.index')}}" class="nav-link {{ request()->routeIs('admin.galeri') ? 'active' : 'text-white' }}">
                <i class="fas fa-images"></i> Galery
            </a>
        </li>


       <!-- Configuration Section -->
<li class="nav-item sidebar-title mb-2 mt-3">Configuration</li>

<li class="nav-item mb-2 dropdown">
    <a href="#" class="nav-link dropdown-toggle text-white" id="settingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-cog"></i> Settings
    </a>
    <ul class="dropdown-menu bg-dark border-0" aria-labelledby="settingDropdown">
        <li>
            <a href="{{ route('admin.profil.edit')}}" class="dropdown-item text-white">
                <i class="fas fa-building"></i> Profil Perusahaan
            </a>
        </li>
        <li>
            <a href="{{ route('admin.profil.editKontak')}}" class="dropdown-item text-white">
                <i class="fas fa-envelope"></i> Kontak
            </a>
        </li>
        <!-- Tambahkan menu lain jika perlu -->
    </ul>
</li>
<!-- Tambahkan jarak antar menu jika perlu -->
<hr class="bg-secondary">

<li class="nav-item mb-2">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</li>

    </ul>
</nav>


        <!-- Content -->
        <div class="content flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>
</html>
