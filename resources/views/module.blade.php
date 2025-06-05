@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Module List</h2>
        <div class="d-flex align-items-center">
            <span class="me-2">admin</span>
            <i class="fas fa-user-circle fa-2x"></i>
        </div>
    </div>

    <div class="card p-4">
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary">Add New</button>
            <input type="text" class="form-control w-25" placeholder="Search...">
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Module Name</th>
                    <th>Module Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info me-1"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash"></i></a>
                        <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-list"></i></a>
                    </td>
                    <td>Produk</td>
                    <td>Produk</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info me-1"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger me-1"><i class="fas fa-trash"></i></a>
                        <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-list"></i></a>
                    </td>
                    <td>Galeri Kegiatan</td>
                    <td>Galeri Kegiatan</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <small>Showing 1 to 2 of 2 entries</small>
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
@endsection
