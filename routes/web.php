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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ResepsionisController;


/*
|--------------------------------------------------------------------------
| PUBLIC / GUEST ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect('/login'));

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('isAdmin')->name('admin.')->group(function () {

        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        Route::resource('jenis', JenisHewanController::class);
        Route::resource('ras', RasController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('kategori-klinis', KategoriKlinisController::class);
        Route::resource('kode-tindakan', KodeTindakanController::class);
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('pemilik', PemilikController::class);
        Route::resource('pet', PetController::class);
        Route::resource('rekam-medis', RekamMedisController::class);
        Route::resource('detail', DetailRekamMedisController::class);
        Route::resource('temu-dokter', TemuDokterController::class);
    });


    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */
    Route::prefix('dokter')->middleware('isDokter')->name('dokter.')->group(function () {

        Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dashboard');
        Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
        Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam.index');
        Route::resource('detail', DetailRekamMedisController::class);

        // Profil
        Route::prefix('profil')->name('profil.')->group(function () {
            Route::get('/', [DokterController::class, 'profilIndex'])->name('index');
            Route::get('/edit', [DokterController::class, 'profilEdit'])->name('edit');
            Route::post('/update', [DokterController::class, 'profilUpdate'])->name('update');
            
        });
    });


    /*
    |--------------------------------------------------------------------------
    | PERAWAT
    |--------------------------------------------------------------------------
    */
    Route::prefix('perawat')->middleware('isPerawat')->name('perawat.')->group(function () {

        Route::get('/dashboard', [PerawatController::class, 'dashboard'])->name('dashboard');
        Route::get('/pet', [PetController::class, 'index'])->name('pet.index');

        Route::prefix('profil')->name('profil.')->group(function () {
            Route::get('/', [PerawatController::class, 'profilIndex'])->name('index');
            Route::get('/edit', [PerawatController::class, 'profilEdit'])->name('edit');
            Route::post('/update', [PerawatController::class, 'profilUpdate'])->name('update');
        });

        Route::resource('rekam', RekamMedisController::class);
        Route::get('/detail', [DetailRekamMedisController::class, 'index'])->name('detail.index');
    });


    /*
    |--------------------------------------------------------------------------
    | RESEPSIONIS
    |--------------------------------------------------------------------------
    */
    Route::prefix('resepsionis')->middleware('isResepsionis')->name('resepsionis.')->group(function () {

        Route::get('/dashboard', [ResepsionisController::class, 'dashboard'])->name('dashboard');

        Route::resource('pemilik', PemilikController::class);
        Route::resource('pet', PetController::class);
        Route::resource('temu-dokter', TemuDokterController::class);

        Route::get('/profil', [ResepsionisController::class, 'index'])->name('profil.index');
    });


    /*
    |--------------------------------------------------------------------------
    | PEMILIK
    |--------------------------------------------------------------------------
    */
    Route::prefix('pemilik')->middleware('isPemilik')->name('pemilik.')->group(function () {

        Route::get('/dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');

        Route::get('/temu-dokter', [TemuDokterController::class, 'index'])->name('temu-dokter.index');
        Route::get('/rekam', [RekamMedisController::class, 'index'])->name('rekam.index');
        Route::get('/pet', [PetController::class, 'index'])->name('pet.index');

        // PROFIL PEMILIK
        Route::get('/profil', [PemilikController::class, 'profilIndex'])->name('profil.index');
        Route::get('/profil/edit', [PemilikController::class, 'profilEdit'])->name('profil.edit');
        Route::post('/profil/update', [PemilikController::class, 'profilUpdate'])->name('profil.update');
    });

});
