@include('components.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <p class="hero-subtitle">PT Solusi Koneksi Anda</p>
                <h1 class="hero-title">Mitra Teknologi Dan<br>Konektivitas Anda</h1>
            </div>
        </div>
    </section>

    <!-- Section: Kenapa Harus Memilih Kami -->
    <section class="why-us">
        <div class="container-whyus">
            <div class="whyus-image">
                <img src="{{ asset('img/whyus.jpg') }}" alt="Kenapa Memilih Kami">
            </div>
            <div class="whyus-text">
                <h2>Kenapa Harus Memilih Kami?</h2>
                <ul>
                    <li>Pengalaman dan Keahlian Terpercaya.</li>
                    <li> Solusi Inovatif dan Terdepan.</li>
                    <li> Layanan Pelanggan yang Unggul.</li>
                    <li> Konektivitas Stabil dan Cepat.</li>
                    <li> Solusi Fleksibel dan Sesuai Kebutuhan.</li>
                    <li> Harga Kompetitif dengan Kualitas Terjamin.</li>
                </ul>
                <a href="{{ route('profil.show') }}" class="btn-tentang">Tentang Kami</a>
            </div>
        </div>
    </section>

    <!-- SECTION: Keamanan & CTA -->
    <section class="secure-section">
        <div class="container secure-container">
            <div class="secure-left">
                <h2>100% aman dan terjamin</h2>
                <p>
                    Pilih PT Solusi Koneksi Anda sebagai mitra teknologi dan konektivitas Anda untuk memastikan solusi
                    terbaik yang dapat diandalkan, inovatif, dan sesuai dengan kebutuhan Anda.
                </p>
            </div>
            <div class="secure-right">
                <a href="https://wa.me/6281295312290" class="cta-button">6281295312290</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="company-info">
                    <div class="company-logo">
                        <img src="{{ asset('img/logo.png') }}" alt="PT Solusi Koneksi Anda Logo">
                        <div class="company-name">PT Solusi Koneksi Anda</div>
                    </div>
               <!--     <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <img src="{{ asset('img/facebook.png') }}" alt="" width="30px" height="30px">
                        </a>
                        <a href="#" class="social-icon youtube">
                            <img src="{{ asset('img/youtube.png') }}" alt="" width="30px" height="30px">
                        </a>
                        <a href="#" class="social-icon instagram">
                            <img src="{{ asset('img/instagram.png') }}" alt="" width="30px" height="30px">
                        </a>
                        <a href="#" class="social-icon twitter">
                            <img src="{{ asset('img/twitter.png') }}" alt="" width="30px" height="30px">
                        </a>
                        <a href="#" class="social-icon linkedin">
                            <img src="{{ asset('img/linkedin.png') }}" alt="" width="30px" height="30px">
                        </a>
                    </div>-->
                </div>

                <div class="address-section">
                    <div class="section-title">
                        <img src="{{ asset('img/placeholder.png') }}" alt="">
                        Alamat
                    </div>
                    <div class="address-details">
                        {{ $kontak->alamat ?? 'alamat' }}
                    </div>

                </div>

                <div class="support-section">
                    <div class="section-title">
                        <img src="{{ asset('img/headphones.png') }}" alt="">
                        Support
                    </div>
                    <div class="support-details">
                        <p>{{ $kontak->phone ?? 'phone' }}</p>
                        <p>{{ $kontak->email ?? 'email' }}</p>
                    </div>
                </div>
            </div>

            <div class="footer-divider"></div>

            <div class="copyright">
                <p> Copyright &copy; 2024 All rights reserved</p>
            </div>
        </div>
    </footer>

</body>

</html>
