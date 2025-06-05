<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function show(){
        $kontak = Kontak::first();
        return view('kontak', compact('kontak'));
    }
}
