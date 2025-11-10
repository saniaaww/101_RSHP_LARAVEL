<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;

Route::get('/', function () {
    return view('Site.welcome');
});

Route::get('/', [SiteController::class, 'index'])->name('site.home');

// tambahan halaman statis
Route::get('/home', [SiteController::class, 'index']);
Route::get('/layanan', fn() => view('site.layanan'))->name('site.layanan');
Route::get('/struktur', fn() => view('site.struktur'))->name('site.struktur');
Route::get('/visi_misi', fn() => view('site.visi_misi'))->name('site.visi_misi');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\DataController;


Route::prefix('admin')->group(function () {
Route::get('/dashboard', [DataController::class, 'index'])->name('admin.dashboard');


Route::get('/data-master/jenis-hewan', [DataController::class, 'jenisIndex'])->name('admin.data.jenis');
Route::get('/data-master/ras-hewan', [DataController::class, 'rasIndex'])->name('admin.data.ras');
Route::get('/data-master/kategori', [DataController::class, 'kategoriIndex'])->name('admin.data.kategori');
Route::get('/data-master/kategori-klinis', [DataController::class, 'kategoriKlinisIndex'])->name('admin.data.kategori_klinis');
Route::get('/data-master/kode-tindakan', [DataController::class, 'kodeTindakanIndex'])->name('admin.data.kode_tindakan');
Route::get('/data-master/pet', [DataController::class, 'petIndex'])->name('admin.data.pet');
Route::get('/data-master/role', [DataController::class, 'roleIndex'])->name('admin.data.role');
Route::get('/data-master/user', [DataController::class, 'userIndex'])->name('admin.data.user');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Dokter
Route::middleware(['auth', 'isDokter'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
});

// Perawat
Route::middleware(['auth', 'isPerawat'])->group(function () {
    Route::get('/perawat/dashboard', [PerawatController::class, 'index'])->name('perawat.dashboard');
});

// Resepsionis
Route::middleware(['auth', 'isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [ResepsionisController::class, 'index'])->name('resepsionis.dashboard');
});

// Pemilik
Route::middleware(['auth', 'isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [PemilikController::class, 'index'])->name('pemilik.dashboard');
});
