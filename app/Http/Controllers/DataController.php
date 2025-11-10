<?php
namespace App\Http\Controllers;

use App\Models\JenisHewan;
use App\Models\RasHewan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakanTerapi;
use App\Models\Pet;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class DataController extends Controller
{
// Halaman utama Data Master
public function index()
{
return view('admin.dashboard');
}


public function jenisIndex()
{
$jenis = JenisHewan::all();
return view('admin.jenis.index', compact('jenis'));
}


public function rasIndex()
{
$ras = RasHewan::with('jenis')->get();
return view('admin.ras.index', compact('ras'));
}


public function kategoriIndex()
{
$kategori = Kategori::all();
return view('admin.kategori.index', compact('kategori'));
}


public function kategoriKlinisIndex()
{
$kk = KategoriKlinis::all();
return view('admin.kategori_klinis.index', compact('kk'));
}


public function kodeTindakanIndex()
{
$kode = KodeTindakanTerapi::with(['kategori','kategoriKlinis'])->get();
return view('admin.kode_tindakan.index', compact('kode'));
}


public function petIndex()
{
$pets = Pet::with(['pemilik.user','ras'])->get();
return view('admin.pet.index', compact('pets'));
}


public function roleIndex()
{
$roles = Role::all();
return view('admin.role.index', compact('roles'));
}


public function userIndex()
{
$users = User::with('roleUsers.role')->get();
return view('admin.user.index', compact('users'));
}
}