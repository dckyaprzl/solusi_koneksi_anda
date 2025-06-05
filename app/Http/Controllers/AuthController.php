<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('/login');
    }
    
    // Proses login manual dengan DB tanpa hash
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        // Ambil data user dari database
        $user = DB::table('users')
                ->where('username', $request->username)
                ->where('password', $request->password)
                ->first();
        
        // Periksa apakah user ditemukan
        if ($user) {
            // Login manual
            Auth::loginUsingId($user->id, $request->filled('remember'));
            
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan tidak valid.',
        ])->withInput($request->except('password'));
    }
    
    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}