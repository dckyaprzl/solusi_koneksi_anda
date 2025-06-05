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

    <!-- Tambahkan link ke CDN CKEditor -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
</head>
<body>
    <section class="container-setting">
        <h2>Pengaturan Profil Perusahaan</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="setting-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $profil->nama_perusahaan) }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Website</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $profil->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="logo">Logo Website</label>
                <input type="file" id="logo" name="logo">
                @if ($profil->logo)
                    <div class="logo-preview">
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Saat Ini">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </section>

    <!-- Aktifkan CKEditor -->
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
@endsection
