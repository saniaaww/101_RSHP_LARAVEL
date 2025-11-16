<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenis = JenisHewan::all();
        return view('admin.jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        $this->validateJenis($request);

        $nama = $this->formatNama($request->nama_jenis_hewan);

        $this->createJenis($nama);

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('admin.jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateJenis($request);

        $nama = $this->formatNama($request->nama_jenis_hewan);

        $this->updateJenis($id, $nama);

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        JenisHewan::destroy($id);

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil dihapus!');
    }

    /* =========================
        VALIDATION
    ========================== */
    private function validateJenis($request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|max:100'
        ]);
    }

    /* =========================
        HELPER
    ========================== */
    private function createJenis($nama)
    {
        JenisHewan::create([
            'nama_jenis_hewan' => $nama
        ]);
    }

    private function updateJenis($id, $nama)
    {
        JenisHewan::where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $nama
        ]);
    }

    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
