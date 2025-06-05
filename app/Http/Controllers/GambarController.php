<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function index(){
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }

    public function create()
    {
        return view('admin.tambah-gambar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:5120', // maksimal 2MB
        ]);
    
        $galeri = new Galeri();
        $galeri->nama = $request->nama;
        $galeri->slug = Str::slug($request->nama);
        $galeri->deskripsi = $request->deskripsi;
    
        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('produk', $namaGambar, 'public');
            $galeri->gambar = 'produk/' . $namaGambar; // Menyimpan path relatif ke database
        }
    
        $galeri->save();
    
        return redirect()->route('admin.galeri.index')->with('success', 'gambar berhasil ditambahkan.');
    }
    
    public function edit(Galeri $galeri)
{
    return view('admin.edit-gambar', compact('galeri'));
}

public function update(Request $request, Galeri $galeri)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:5120', // maksimal 2MB
    ]);

    $galeri->nama = $request->nama;
    $galeri->slug = Str::slug($request->nama);
    $galeri->deskripsi = $request->deskripsi;

    // Jika ada gambar baru, upload gambar
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($galeri->gambar) {
            $oldImagePath = storage_path('app/public/' . $galeri->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Hapus gambar lama
            }
        }

        // Upload gambar baru
        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('galeri', $namaGambar, 'public');
        $galeri->gambar = 'galeri/' . $namaGambar;  // Simpan path relatif
    }

    $galeri->save();

    return redirect()->route('admin.galeri.index')->with('success', 'Produk berhasil diperbarui.');
}

public function destroy($id)
{
    $galeri = Galeri::findOrFail($id);

    // Hapus file gambar kalau ada
    if ($galeri->gambar && Storage::exists(str_replace('storage/', 'public/', $galeri->gambar))) {
        Storage::delete(str_replace('storage/', 'public/', $galeri->gambar));
    }

    // Hapus data artikel
    $galeri->delete();

    return response()->json(['message' => 'Produk berhasil dihapus.']);
}
}
