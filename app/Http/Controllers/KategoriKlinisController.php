<?php

namespace App\Http\Controllers;

use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategori = KategoriKlinis::all();
        return view('admin.kategori_klinis.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        $this->createData($request->nama_kategori_klinis);

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriKlinis::findOrFail($id);
        return view('admin.kategori_klinis.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validateData($request);

        $this->updateData($id, $request->nama_kategori_klinis);

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        KategoriKlinis::destroy($id);

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', 'Data berhasil dihapus');
    }

    /* --------------------
       VALIDATION
    --------------------- */
    private function validateData(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:50'
        ]);
    }

    /* --------------------
       HELPER
    --------------------- */
    private function createData($nama)
    {
        KategoriKlinis::create([
            'nama_kategori_klinis' => $nama
        ]);
    }

    private function updateData($id, $nama)
    {
        KategoriKlinis::where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $nama
        ]);
    }
}
