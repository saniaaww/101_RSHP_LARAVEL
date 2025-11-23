<?php

namespace App\Http\Controllers;

use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;
use Illuminate\Http\Request;

class DetailRekamMedisController extends Controller
{
    public function index()
    {
        $data = DetailRekamMedis::with(['rekamMedis', 'tindakan'])->get();
        return view('admin.detail_rekam.index', compact('data'));
    }

    public function create()
    {
        $rekam = RekamMedis::all();
        $tindakan = KodeTindakanTerapi::all();

        return view('admin.detail_rekam.create', compact('rekam','tindakan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idrekam_medis' => 'required',
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'required'
        ]);

        DetailRekamMedis::create($request->all());

        return redirect()->route('admin.detail-rekam.index')
            ->with('success', 'Detail rekam medis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = DetailRekamMedis::findOrFail($id);
        $rekam = RekamMedis::all();
        $tindakan = KodeTindakanTerapi::all();

        return view('admin.detail_rekam.edit', compact('data','rekam','tindakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idrekam_medis' => 'required',
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'required'
        ]);

        DetailRekamMedis::find($id)->update($request->all());

        return redirect()->route('admin.detail-rekam.index')
            ->with('success', 'Detail rekam medis berhasil diupdate');
    }

    public function destroy($id)
    {
        DetailRekamMedis::find($id)->delete();

        return redirect()->route('admin.detail-rekam.index')
            ->with('success', 'Detail rekam medis dihapus');
    }
}
