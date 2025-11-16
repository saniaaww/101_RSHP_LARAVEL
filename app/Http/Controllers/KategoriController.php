<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $this->validateKategori($request);

        $nama = $this->formatNama($request->nama_kategori);

        $this->createKategori($nama);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validateKategori($request);

        $nama = $this->formatNama($request->nama_kategori);

        $this->updateKategori($id, $nama);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }

    /* === VALIDATION === */
    private function validateKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);
    }

    /* === HELPER === */
    private function createKategori($nama)
    {
        Kategori::create(['nama_kategori' => $nama]);
    }

    private function updateKategori($id, $nama)
    {
        Kategori::where('idkategori', $id)
                ->update(['nama_kategori' => $nama]);
    }

    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
