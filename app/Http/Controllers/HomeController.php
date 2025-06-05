<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $kontak = Kontak::first(); // Ambil data profil pertama
        return view('home', compact('kontak'));
    }
}
