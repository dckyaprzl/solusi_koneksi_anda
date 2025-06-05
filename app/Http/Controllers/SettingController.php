<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Models\Profile;

class SettingController extends Controller
{
    public function edit()
    {
        $profil = Profil::first(); // Ambil data profil yang pertama (atau sesuaikan)
        return view('admin.setting-profile', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profil = Profil::first();

        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->deskripsi = $request->deskripsi;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('logos', 'public');
            $profil->logo = $logo;
        }

        $profil->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil berhasil diperbarui.');
    }
    public function editKontak()
    {
        $kontak = Kontak::first(); // Ambil data profil yang pertama (atau sesuaikan)
        return view('admin.setting-kontak', compact('kontak'));
    }

    public function updateKontak(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'phone' => 'required|string',
            'alamat' => 'required|string|max:255',
        ]);
    
        $kontak = Kontak::first();
    
        $kontak->email = $request->email;
        $kontak->phone = $request->phone;
        $kontak->alamat = $request->alamat;
        
        $kontak->save();
    
        return redirect()->route('admin.profil.editKontak')->with('success', 'Profil berhasil diperbarui.');
    }
}    
