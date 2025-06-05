<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SettingController;
use Database\Seeders\GaleriSeeder;
use Illuminate\Support\Facades\Route;

// ======================================
// Public Routes (User)
// ======================================

// Welcome page
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User-facing pages
Route::get('/home', [HomeController::class, 'index'])->name('home.show');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.show');
Route::get('/produk/{slug}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/galeri/{slug}', [GaleriController::class, 'show'])->name('galeri.show');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/kontak', [KontakController::class, 'show'])->name('kontak.show');

// ======================================
// Admin Routes
// ======================================
Route::middleware(['auth'])->group(function () {
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    // Produk
    Route::get('/produk', [ModuleController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ModuleController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ModuleController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ModuleController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ModuleController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ModuleController::class, 'destroy'])->name('produk.destroy');
//gambar
Route::get('/galeri', [GambarController::class, 'index'])->name('galeri.index');
Route::get('/galeri/create', [GambarController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GambarController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{galeri}/edit', [GambarController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{galeri}', [GambarController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GambarController::class, 'destroy'])->name('galeri.destroy');

//setting
    Route::get('/setting/profil', [SettingController::class, 'edit'])->name('profil.edit');
    Route::put('/setting/profil', [SettingController::class, 'update'])->name('profil.update');
    Route::get('/setting/kontak', [SettingController::class, 'editKontak'])->name('profil.editKontak');
    Route::put('/setting/kontak', [SettingController::class, 'updateKontak'])->name('profil.updateKontak');

//artikel
    Route::get('/articles', [ArticleController::class, 'show'])->name('article');
    // CRUD Artikel
    Route::get('/artikel/tambah', [ArticleController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArticleController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArticleController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArticleController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{id}', [ArticleController::class, 'destroy'])->name('artikel.destroy');
});
});
