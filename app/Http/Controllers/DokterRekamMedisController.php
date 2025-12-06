<?php
namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use App\Models\DetailRekamMedis;

class DokterRekamMedisController extends Controller
{
    public function index($idpet)
    {
        $rekam = RekamMedis::where('idpet', $idpet)->get();
        return view('dokter.rekam.index', compact('rekam'));
    }

    public function show($idrekam)
    {
        $rekam = RekamMedis::findOrFail($idrekam);
        $detail = DetailRekamMedis::where('idrekam_medis', $idrekam)->get();
        return view('dokter.rekam.show', compact('rekam', 'detail'));
    }
}
