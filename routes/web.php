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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ResepsionisController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/home', [SiteController::class, 'index']);

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
| PROTECTED ROUTES
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

        // CRUD master + transaksi
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
    Route::prefix('dokter')
        ->middleware('isDokter')
        ->name('dokter.')
        ->group(function () {

        Route::view('/dashboard', 'dokter.dashboard')->name('dashboard');

        // View pasien (pet)
        Route::get('/pet', [PetController::class, 'index'])->name('pet.index');

        // View rekam medis
        Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam.index');

        // CRUD detail rekam medis
        Route::resource('detail', DetailRekamMedisController::class);

        // Profil dokter
        Route::get('/profil', [DokterController::class, 'profil'])->name('profil.index');
    });


    /*
    |--------------------------------------------------------------------------
    | PERAWAT
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'isPerawat'])
        ->prefix('perawat')
        ->name('perawat.')
        ->group(function () {

            Route::get('/dashboard', [PerawatController::class, 'dashboard'])->name('dashboard');

            Route::get('/pet', [PetController::class, 'index'])->name('pet.index');

            Route::get('/profil', [PerawatController::class, 'index'])->name('profil.index');

            Route::resource('/rekam', RekamMedisController::class);

            Route::get('detail', [DetailRekamMedisController::class, 'index'])-> name('detail.index');
        });

    /*
    |--------------------------------------------------------------------------
    | RESEPSIONIS
    |--------------------------------------------------------------------------
    */
  Route::middleware(['auth', 'isResepsionis'])
    ->prefix('resepsionis')
     ->name('resepsionis.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [ResepsionisController::class, 'dashboard'])->name('dashboard');

    // CRUD PEMILIK
    Route::resource('/pemilik', PemilikController::class);

    // CRUD PET
    Route::resource('/pet', PetController::class);

    // CRUD TEMU DOKTER
    Route::resource('/temu-dokter', TemuDokterController::class);
    Route::get('/profil', [ResepsionisController::class, 'index'])->name('profil.index');
});

    /*
    |--------------------------------------------------------------------------
    | PEMILIK
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'isPemilik'])
    ->prefix('pemilik')
    ->name('pemilik.')
    ->group(function () {
        
        Route::get('/dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');

        // Jadwal Temu Dokter
        Route::get('/temu-dokter', [TemuDokterController::class, 'temuDokter'])
            ->name('temu-dokter.index');

        // Rekam Medis
        Route::get('/rekam', [RekamMedisController::class, 'rekamMedis'])
            ->name('rekam.index');

        // Pet yang dimiliki
        Route::get('/pet', [PetController::class, 'pet'])
            ->name('pet.index');

        // Profil Pemilik
        Route::get('/profil', [PemilikController::class, 'profil'])
            ->name('profil.index');
    });

});

