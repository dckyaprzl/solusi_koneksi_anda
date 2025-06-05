@include('components.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/profil.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Profil Perusahaan</title>
</head>
<body>
    <section class="container">
      <div class="image-container">
        <img src="{{ asset('img/profil.jpg') }}" alt="Secure Illustration">
      </div>
        <div class="content-container">
          <h2>{{ $profil->nama_perusahaan ?? 'Nama Perusahaan' }}</h2>
          <p>{!! $profil->deskripsi ?? 'Deskripsi perusahaan belum tersedia.' !!}</p>
        </div>
      </section>
    
      <footer>
        <div class="footer-container">
        
        </div>
        <div class="footer-bottom">
          <p> Copyright &copy; 2024 All rights reserved</p>
        </div>
      </footer>
</body>
</html>
