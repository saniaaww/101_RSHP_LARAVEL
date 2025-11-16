<?php

namespace App\Http\Controllers;

use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KodeTindakanController extends Controller
{
    public function index()
    {
        $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('admin.kode_tindakan.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        return view('admin.kode_tindakan.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        KodeTindakanTerapi::create([
            'kode' => strtoupper($request->kode),
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        return view('admin.kode_tindakan.edit', compact('data', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        KodeTindakanTerapi::where('idkode_tindakan_terapi', $id)
            ->update([
                'kode' => strtoupper($request->kode),
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        KodeTindakanTerapi::destroy($id);

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil dihapus');
    }

    private function validateInput(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'deskripsi_tindakan_terapi' => 'required',
            'idkategori' => 'required',
            'idkategori_klinis' => 'required',
        ]);
    }
}
