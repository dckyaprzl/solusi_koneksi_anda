<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function show()
    {
        $artikels = Artikel::all(); 
        return view('admin.artikel', compact('artikels'));
    }

    public function create()
    {
    return view('admin.tambah-artikel');
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'post_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        // Upload gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . '_' . Str::slug($request->post_name) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('artikel', $nama_file, 'public'); // Simpan ke storage/app/public/artikel
            $path = 'storage/' . $path; // supaya bisa diakses dari public/storage/artikel
        }

        // Simpan ke database
        Artikel::create([
            'post_name' => $request->post_name,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.article')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.edit-artikel', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = $request->only('post_name', 'title', 'deskripsi', 'status');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && Storage::disk('public')->exists(str_replace('storage/', '', $artikel->gambar))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $artikel->gambar));
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $nama_file = time() . '_' . Str::slug($request->post_name) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('artikel', $nama_file, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $artikel->update($data);

        return redirect()->route('admin.article')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
{
    $artikel = Artikel::findOrFail($id);

    // Hapus file gambar kalau ada
    if ($artikel->gambar && Storage::exists(str_replace('storage/', 'public/', $artikel->gambar))) {
        Storage::delete(str_replace('storage/', 'public/', $artikel->gambar));
    }

    // Hapus data artikel
    $artikel->delete();

    return response()->json(['message' => 'Artikel berhasil dihapus.']);
}

}
