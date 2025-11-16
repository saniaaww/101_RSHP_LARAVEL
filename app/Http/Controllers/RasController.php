<?php

namespace App\Http\Controllers;

use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasController extends Controller
{
    public function index()
    {
        $data = RasHewan::with('jenis')->get();
        return view('admin.ras.index', compact('data'));
    }

    public function create()
    {
        $jenis = JenisHewan::all();
        return view('admin.ras.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $this->validateRas($request);

        $nama = $this->formatNama($request->nama_ras);

        $this->createRas($nama, $request->idjenis_hewan);

        return redirect()->route('admin.ras.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = RasHewan::findOrFail($id);
        $jenis = JenisHewan::all();
        return view('admin.ras.edit', compact('data', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRas($request);

        $nama = $this->formatNama($request->nama_ras);

        $this->updateRas($id, $nama, $request->idjenis_hewan);

        return redirect()->route('admin.ras.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        RasHewan::destroy($id);

        return redirect()->route('admin.ras.index')
            ->with('success', 'Data berhasil dihapus');
    }

    /* VALIDATION */
    private function validateRas(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|integer'
        ]);
    }

    /* HELPER */
    private function createRas($nama, $idjenis)
    {
        RasHewan::create([
            'nama_ras' => $nama,
            'idjenis_hewan' => $idjenis
        ]);
    }

    private function updateRas($id, $nama, $idjenis)
    {
        RasHewan::where('idras_hewan', $id)->update([
            'nama_ras' => $nama,
            'idjenis_hewan' => $idjenis
        ]);
    }

    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
