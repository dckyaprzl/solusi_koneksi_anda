@include('components.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/galeri.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <!-- HEADER / HERO -->
  <div class="hero">
    <h1>{{ $galeri->nama }}</h1>
  </div>

  <!-- MAIN CONTENT -->
  <div class="wrapper">
    <div class="sidebar">
      <h3>Galeri</h3>
      @foreach ($daftarGaleri as $item)
        <a href="{{ route('galeri.show', $item->slug) }}"
           class="{{ $item->slug === $galeri->slug ? 'active' : '' }}">
          {{ $item->nama }}
        </a>
      @endforeach
    </div>

    <div class="content">
      <h2>{{ $galeri->nama }}</h2>
      @if($galeri->gambar)
      <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->nama }}">
  @endif
      {!! $galeri->deskripsi !!}
    </div>
  </div>

  <footer>
    Copyright &copy; {{ date('Y') }} PT Solusi Koneksi Anda. All rights reserved.
  </footer>
</body>
</html>