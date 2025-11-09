<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;

Route::get('/', function () {
    return view('Site.welcome');
});

Route::get('/', [SiteController::class, 'index'])->name('site.home');

// tambahan halaman statis
Route::get('/home', [SiteController::class, 'index']);
Route::get('/layanan', fn() => view('site.layanan'))->name('site.layanan');
Route::get('/struktur', fn() => view('site.struktur'))->name('site.struktur');
Route::get('/visi_misi', fn() => view('site.visi_misi'))->name('site.visi_misi');

use App\Http\Controllers\DataController;


Route::prefix('admin')->group(function () {
Route::get('/data-master', [DataController::class, 'index'])->name('admin.data.master');


Route::get('/data-master/jenis-hewan', [DataController::class, 'jenisIndex'])->name('admin.data.jenis');
Route::get('/data-master/ras-hewan', [DataController::class, 'rasIndex'])->name('admin.data.ras');
Route::get('/data-master/kategori', [DataController::class, 'kategoriIndex'])->name('admin.data.kategori');
Route::get('/data-master/kategori-klinis', [DataController::class, 'kategoriKlinisIndex'])->name('admin.data.kategori_klinis');
Route::get('/data-master/kode-tindakan', [DataController::class, 'kodeTindakanIndex'])->name('admin.data.kode_tindakan');
Route::get('/data-master/pet', [DataController::class, 'petIndex'])->name('admin.data.pet');
Route::get('/data-master/role', [DataController::class, 'roleIndex'])->name('admin.data.role');
Route::get('/data-master/user', [DataController::class, 'userIndex'])->name('admin.data.user');
});
