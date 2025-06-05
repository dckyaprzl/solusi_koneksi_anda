@php
    use App\Models\Produk;
    use App\Models\Profil;
    use App\Models\Kontak;
    use App\Models\Galeri;
    $profil = Profil::first();
    $kontak = Kontak::first();
    $daftarProduk = Produk::all();
    $daftarGaleri = Galeri::all();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
    <title>Document</title>

    <!-- Loader Style -->
    <style>
        .loader-wrapper {
            position: fixed;
            inset: 0;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
            pointer-events: all;
        }

        .loader-wrapper.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .colorful-loader {
            position: relative;
            width: 60px;
            height: 60px;
        }

        .colorful-loader span {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 6px solid transparent;
            border-top-color: #ff3d00;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .colorful-loader span:nth-child(2) {
            border-top-color: #2196f3;
            animation-delay: 0.15s;
        }

        .colorful-loader span:nth-child(3) {
            border-top-color: #4caf50;
            animation-delay: 0.3s;
        }

        .colorful-loader span:nth-child(4) {
            border-top-color: #ffc107;
            animation-delay: 0.45s;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div class="loader-wrapper hidden" id="loader">
        <div class="colorful-loader">
            <span></span><span></span><span></span><span></span>
        </div>
    </div>


    @yield('content')

    <header>
        <!-- Topbar -->
        <div class="topbar">
            <div class="logo">
                @if ($profil && $profil->logo)
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo">
                @else
                    <img src="{{ asset('img/logo.png') }}" alt="Default Logo">
                @endif
                <span>{{ $profil->nama_perusahaan ?? 'Nama Perusahaan' }}</span>
            </div>
            <div class="contact-info">
                <div class="mail">
                    <img src="{{ asset('img/email.png') }}" alt="">
                    <a href="mailto:info@solusikoneksianda.com">{{ $kontak->email ?? 'email' }}</a>
                </div>
                <span>|</span>
                <div class="contact">
                    <img src="{{ asset('img/whatsapp.png') }}" alt="">
                    <a href="tel:+6281234567890">{{ $kontak->phone ?? 'phone' }}</a>
                </div>
            </div>
        </div>

        <!-- Garis pembatas -->
        <hr class="divider" />

        <nav class="menubar">
            <button class="hamburger" id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-overlay" id="nav-overlay"></div>

            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('home.show') }}">Home</a></li>
                <li><a href="{{ route('profil.show') }}">Profil Perusahaan</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Produk ▼</a>
                    <ul class="dropdown-menu">
                        @foreach ($daftarProduk as $produk)
                            <li><a href="{{ route('produk.show', $produk->slug) }}">{{ $produk->nama }}</a></li>
                        @endforeach
                    </ul>
                    
                </li>
                <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Galeri Kegiatan ▼</a>
                    <ul class="dropdown-menu">
                        @foreach ($daftarGaleri as $galeri)
                            <li><a href="{{ route('galeri.show', $galeri->slug) }}">{{ $galeri->nama }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('kontak.show') }}">Kontak Kami</a></li>
            </ul>
        </nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger-menu');
            const navLinks = document.getElementById('nav-links');
            const navOverlay = document.getElementById('nav-overlay');
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                navOverlay.classList.toggle('active');
            });

            navOverlay.addEventListener('click', function() {
                navLinks.classList.remove('active');
                navOverlay.classList.remove('active');
            });

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth <= 992) {
                        e.preventDefault();
                        const parent = this.parentElement;
                        parent.classList.toggle('open');
                    }
                });
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    navLinks.classList.remove('active');
                    navOverlay.classList.remove('active');
                    document.querySelectorAll('.dropdown.open').forEach(item => {
                        item.classList.remove('open');
                    });
                }
            });
        });
    </script>

    @livewireScripts
    <script>
        const loader = document.getElementById('loader');

        // Loader saat proses Livewire
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.sent', () => {
                loader.classList.remove('hidden');
            });

            Livewire.hook('message.processed', () => {
                loader.classList.add('hidden');
            });
        });

        // Loader saat pindah halaman biasa (navigasi)
        window.addEventListener('beforeunload', () => {
            loader.classList.remove('hidden');
        });
    </script>
</body>

</html>
