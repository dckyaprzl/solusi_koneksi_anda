@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Profil Perusahaan</title>
    <link rel="stylesheet" href="{{ asset('css/setting-profil.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <section class="container-setting">
        <h2>Pengaturan Kontak</h2>

        <form action="{{ route('admin.profil.updateKontak') }}" method="POST" enctype="multipart/form-data" class="setting-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email', $kontak->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $kontak->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $kontak->alamat) }}" required>
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </section>

    
</body>
</html>
@endsection
