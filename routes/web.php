<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/home', [SiteController::class, 'index']);

Route::get('/layanan', fn() => view('site.layanan'))->name('site.layanan');
Route::get('/struktur', fn() => view('site.struktur'))->name('site.struktur');
Route::get('/visi_misi', fn() => view('site.visi_misi'))->name('site.visi_misi');

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
| DASHBOARD SESUAI ROLE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // ------------------------------------
    // ADMIN
    // ------------------------------------
    Route::middleware('isAdmin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/data-master/jenis-hewan', [DataController::class, 'jenisIndex'])->name('admin.data.jenis');
        Route::get('/admin/data-master/ras-hewan', [DataController::class, 'rasIndex'])->name('admin.data.ras');
        Route::get('/admin/data-master/kategori', [DataController::class, 'kategoriIndex'])->name('admin.data.kategori');
        Route::get('/admin/data-master/kategori-klinis', [DataController::class, 'kategoriKlinisIndex'])->name('admin.data.kategori_klinis');
        Route::get('/admin/data-master/kode-tindakan', [DataController::class, 'kodeTindakanIndex'])->name('admin.data.kode_tindakan');
        Route::get('/admin/data-master/pet', [DataController::class, 'petIndex'])->name('admin.data.pet');
        Route::get('/admin/data-master/role', [DataController::class, 'roleIndex'])->name('admin.data.role');
        Route::get('/admin/data-master/user', [DataController::class, 'userIndex'])->name('admin.data.user');
    });

    // ------------------------------------
    // DOKTER
    // ------------------------------------
    Route::middleware('isDokter')
        ->get('/dokter/dashboard', [DokterController::class, 'index'])
        ->name('dokter.dashboard');

    // ------------------------------------
    // PERAWAT
    // ------------------------------------
    Route::middleware('isPerawat')
        ->get('/perawat/dashboard', [PerawatController::class, 'index'])
        ->name('perawat.dashboard');

    // ------------------------------------
    // RESEPSIONIS
    // ------------------------------------
    Route::middleware('isResepsionis')
        ->get('/resepsionis/dashboard', [ResepsionisController::class, 'index'])
        ->name('resepsionis.dashboard');

    // ------------------------------------
    // PEMILIK
    // ------------------------------------
    Route::middleware('isPemilik')
        ->get('/pemilik/dashboard', [PemilikController::class, 'index'])
        ->name('pemilik.dashboard');
});
