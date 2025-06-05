@extends('layout.app')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri | Admin</title>
</head>
<body>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Galeri List</h2>
        <div class="d-flex align-items-center">
            <span class="me-2">admin</span>
            <i class="fas fa-user-circle fa-2x"></i>
        </div>
    </div>
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Nama</th>
                    <th>slug</th>
                    <th>deskripsi</th>
                    <th>gambar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeri as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td>
                            <a href="{{ route('admin.galeri.edit', $p->id) }}" class="btn btn-sm btn-info me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="{{ route('admin.galeri.destroy', $p->id) }}" 
                                class="btn btn-danger btn-sm btn-delete" 
                                data-id="{{ $p->id }}">
                                <i class="fas fa-trash"></i>
                             </a>
                             
                        </td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->slug }}</td>
                        <td>{!! $p->deskripsi!!}</td>
                        <td>
                            @if ($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="Gambar" width="100">
                            @else
                                -
                            @endif
                        </td>
                        
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $(document).ready(function(){
                $('.btn-delete').click(function(e){
                    e.preventDefault();
                    var url = $(this).attr('href');
                    if(confirm('Yakin ingin menghapus artikel ini?')) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            success: function(response) {
                                alert('Artikel berhasil dihapus.');
                                location.reload(); // reload halaman setelah berhasil
                            },
                            error: function(xhr) {
                                alert('Gagal menghapus artikel.');
                                console.error(xhr.responseText); // Lihat detail errornya di console browser
                            }
                        });
                    }
                });
            });
        </script>
</body>
</html>
@endsection