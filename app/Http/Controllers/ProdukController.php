<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        $daftarProduk = Produk::all(); // Ambil semua produk dari database

        return view('produk.show', compact('produk', 'daftarProduk'));
    }
}

