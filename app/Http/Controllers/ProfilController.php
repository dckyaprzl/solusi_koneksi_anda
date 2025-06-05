<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first(); // Ambil data profil pertama
        return view('profil', compact('profil'));
    }
}
