<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriKlinisController;
use App\Http\Controllers\KodeTindakanController;
use App\Http\Controllers\RasController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/home', [SiteController::class, 'index']);

Route::view('/layanan', 'site.layanan')->name('site.layanan');
Route::view('/struktur', 'site.struktur')->name('site.struktur');
Route::view('/visi_misi', 'site.visi_misi')->name('site.visi_misi');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD & ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // ------------------------
    // DASHBOARD ADMIN
    // ------------------------
    Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('jenis', JenisHewanController::class);
        Route::resource('ras', RasController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('kategori-klinis', KategoriKlinisController::class);
        Route::resource('kode-tindakan', KodeTindakanController::class);
        Route::resource('pet', PetController::class);
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);

    });


   

    // ------------------------
    // DOKTER
    // ------------------------
    Route::middleware('isDokter')
        ->get('/dokter/dashboard', [DokterController::class, 'index'])
        ->name('dokter.dashboard');

    // ------------------------
    // PERAWAT
    // ------------------------
    Route::middleware('isPerawat')
        ->get('/perawat/dashboard', [PerawatController::class, 'index'])
        ->name('perawat.dashboard');

    // ------------------------
    // RESEPSIONIS
    // ------------------------
    Route::middleware('isResepsionis')
        ->get('/resepsionis/dashboard', [ResepsionisController::class, 'index'])
        ->name('resepsionis.dashboard');

    // ------------------------
    // PEMILIK
    // ------------------------
    Route::middleware('isPemilik')
        ->get('/pemilik/dashboard', [PemilikController::class, 'index'])
        ->name('pemilik.dashboard');
});
