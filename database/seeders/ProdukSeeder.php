<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Produk::create([
            'nama' => 'SOLUSNect',
            'slug' => 'solusnect',
            'deskripsi' => '<p>Layanan ini ...</p>', // pakai HTML jika perlu
            'gambar' => 'solusnect.jpg'
        ]);

        Produk::create([
            'nama' => 'SOLUSWeb',
            'slug' => 'solusweb',
            'deskripsi' => '<p>Layanan ini ...</p>', // pakai HTML jika perlu
            'gambar' => 'solusnect.jpg'
        ]);
    
    }    
}
