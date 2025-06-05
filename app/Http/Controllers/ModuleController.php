<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk', compact('produk'));
    }

    public function create()
    {
        return view('admin.tambah-produk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048', // maksimal 2MB
        ]);
    
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->slug = Str::slug($request->nama);
        $produk->deskripsi = $request->deskripsi;
    
        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('produk', $namaGambar, 'public');
            $produk->gambar = 'produk/' . $namaGambar; // Menyimpan path relatif ke database
        }
    
        $produk->save();
    
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    
    public function edit(Produk $produk)
{
    return view('admin.edit-produk', compact('produk'));
}

public function update(Request $request, Produk $produk)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048', // maksimal 2MB
    ]);

    $produk->nama = $request->nama;
    $produk->slug = Str::slug($request->nama);
    $produk->deskripsi = $request->deskripsi;

    // Jika ada gambar baru, upload gambar
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($produk->gambar) {
            $oldImagePath = storage_path('app/public/' . $produk->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Hapus gambar lama
            }
        }

        // Upload gambar baru
        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('produk', $namaGambar, 'public');
        $produk->gambar = 'produk/' . $namaGambar;  // Simpan path relatif
    }

    $produk->save();

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
}

public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    // Hapus file gambar kalau ada
    if ($produk->gambar && Storage::exists(str_replace('storage/', 'public/', $produk->gambar))) {
        Storage::delete(str_replace('storage/', 'public/', $produk->gambar));
    }

    // Hapus data artikel
    $produk->delete();

    return response()->json(['message' => 'Produk berhasil dihapus.']);
}
    }
