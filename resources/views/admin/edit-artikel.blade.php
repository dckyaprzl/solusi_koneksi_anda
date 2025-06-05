@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Article</h2>
    <a href="{{ route('admin.article') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card p-4">
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="post_name" class="form-label">Post Name</label>
            <input type="text" class="form-control" id="post_name" name="post_name" value="{{ old('post_name', $artikel->post_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $artikel->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Optional)</label>
            <input type="file" class="form-control mb-2" id="gambar" name="gambar">
        
            @if ($artikel->gambar)
                <div class="mt-2">
                    <img src="{{ asset($artikel->gambar) }}" alt="Gambar Artikel" class="img-fluid rounded" style="max-height: 200px;">
                </div>
            @endif
        </div>
        

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status" required>
                <option value="aktif" {{ old('status', $artikel->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ old('status', $artikel->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
       
                
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</div>
<!-- SUMMERNOTE CSS dan JS langsung dimuat -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#deskripsi').summernote({
            placeholder: 'Tulis deskripsi di sini...',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection

@push('scripts')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $('#deskripsi').summernote({
        height: 200
    });
});
</script>
@endpush
