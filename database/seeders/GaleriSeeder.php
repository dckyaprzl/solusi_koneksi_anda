<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galeri::create([
            'nama' => 'Telepon Genggam',
            'slug' => 'telepongenggam',
            'deskripsi' => '<p>Ini adalah...</p>', // pakai HTML jika perlu
            'gambar' => 'telepon.jpg'
        ]);

        Galeri::create([
            'nama' => 'Musium Indonesia',
            'slug' => 'musiumindonesia',
            'deskripsi' => '<p>Ini adalah ...</p>', // pakai HTML jika perlu
            'gambar' => 'musium.jpg'
        ]);
    }
}
