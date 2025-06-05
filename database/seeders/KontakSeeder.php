<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'email' => 'info@solusikoneksianda.com',
            'phone' => '62637723',
            'alamat' => 'Jl.Raya Pajajaran No.88 F Kota Bogor 16153', // nanti kamu bisa sesuaikan upload file logonya
        ]);
    }
}
