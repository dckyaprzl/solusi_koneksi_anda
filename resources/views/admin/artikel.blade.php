@extends('layout.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Article List</h2>
        <div class="d-flex align-items-center">
            <span class="me-2">admin</span>
            <i class="fas fa-user-circle fa-2x"></i>
        </div>
    </div>
    
    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">Add New</a>
        </div>
    
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Post Name</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $index => $artikel)
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td>
                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-sm btn-info me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="{{ route('admin.artikel.destroy', $artikel->id) }}" 
                                class="btn btn-danger btn-sm btn-delete" 
                                data-id="{{ $artikel->id }}">
                                <i class="fas fa-trash"></i>
                             </a>
                             
                        </td>
                        <td>{{ $artikel->post_name }}</td>
                        <td>{{ $artikel->title }}</td>
                        <td>{{ $artikel->status}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
        <div class="d-flex justify-content-between">
            <small>Showing {{ $artikels->count() }} of {{ $artikels->count() }} entries</small>
            <nav>
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <footer class="mt-4 text-center">
        <small>© 2024 Copyright SKA Dev</small>
    </footer>
    
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
