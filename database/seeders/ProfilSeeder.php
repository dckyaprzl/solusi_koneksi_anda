<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        Profil::create([
            'nama_perusahaan' => 'Solusi Koneksi Anda',
            'deskripsi' => 'Menyediakan layanan koneksi internet cepat dan stabil.',
            'logo' => 'logo.png', // nanti kamu bisa sesuaikan upload file logonya
        ]);
    }
}
