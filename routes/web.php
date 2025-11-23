<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriKlinisController;
use App\Http\Controllers\KodeTindakanController;
use App\Http\Controllers\RasController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DetailRekamMedisController;
use App\Http\Controllers\TemuDokterController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
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
| ROLE BASED AREA (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')
        ->middleware('isAdmin')
        ->name('admin.')
        ->group(function () {

        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // All CRUD master + transactional
        Route::resource('jenis', JenisHewanController::class);
        Route::resource('ras', RasController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('kategori-klinis', KategoriKlinisController::class);
        Route::resource('kode-tindakan', KodeTindakanController::class);
        Route::resource('user', UserController::class);
        Route::resource('pemilik', PemilikController::class);
        Route::resource('pet', PetController::class);
        Route::resource('rekam-medis', RekamMedisController::class);
        Route::resource('detail-rekam', DetailRekamMedisController::class);
        Route::resource('temu-dokter', TemuDokterController::class);
    });


    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */
    Route::prefix('dokter')
        ->middleware('isDokter')
        ->name('dokter.')
        ->group(function () {

        Route::view('/dashboard', 'dokter.dashboard')->name('dashboard');

        Route::get('/pet', [PetController::class, 'indexDokter'])->name('pet');
        Route::get('/rekam-medis', [RekamMedisController::class, 'indexDokter'])->name('rekam');
        Route::resource('detail-rekam-medis', DetailRekamMedisController::class);
        Route::get('/profil', [ProfilController::class, 'dokter'])->name('profil');
    });


    /*
    |--------------------------------------------------------------------------
    | PERAWAT
    |--------------------------------------------------------------------------
    */
    Route::prefix('perawat')
        ->middleware('isPerawat')
        ->name('perawat.')
        ->group(function () {

        Route::view('/dashboard', 'perawat.dashboard')->name('dashboard');

        Route::get('/pet', [PetController::class, 'indexPerawat'])->name('pet');
        Route::resource('rekam-medis', RekamMedisController::class);
        Route::get('/detail-rekam-medis/{id}', [DetailRekamMedisController::class, 'showPerawat'])
            ->name('detail.show');
        Route::get('/profil', [ProfilController::class, 'perawat'])->name('profil');
    });


    /*
    |--------------------------------------------------------------------------
    | RESEPSIONIS
    |--------------------------------------------------------------------------
    */
    Route::prefix('resepsionis')
        ->middleware('isResepsionis')
        ->name('resepsionis.')
        ->group(function () {

        Route::view('/dashboard', 'resepsionis.dashboard')->name('dashboard');

        Route::resource('pemilik', PemilikController::class);
        Route::resource('pet', PetController::class);
        Route::resource('temu-dokter', TemuDokterController::class);
    });


    /*
    |--------------------------------------------------------------------------
    | PEMILIK
    |--------------------------------------------------------------------------
    */
    Route::prefix('pemilik')
        ->middleware('isPemilik')
        ->name('pemilik.')
        ->group(function () {

        Route::view('/dashboard', 'pemilik.dashboard')->name('dashboard');

        Route::get('/pet', [PetController::class, 'indexPemilik'])->name('pet');
        Route::get('/rekam-medis', [RekamMedisController::class, 'indexPemilik'])->name('rekam');
        Route::get('/jadwal', [TemuDokterController::class, 'indexPemilik'])->name('jadwal');
        Route::get('/profil', [ProfilController::class,'pemilik'])->name('profil');
    });
});
