<?php
namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class DokterProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = Dokter::where('iduser', $user->iduser)->first();

        return view('dokter.profil.index', compact('user', 'dokter'));
    }
}
