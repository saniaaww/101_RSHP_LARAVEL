<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /* =====================================
        INDEX (Query Builder)
    ====================================== */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    /* =====================================
        CREATE
    ====================================== */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /* =====================================
        STORE (INSERT Query Builder)
    ====================================== */
    public function store(Request $request)
    {
        $this->validateKategori($request);

        $nama = $this->formatNama($request->nama_kategori);

        DB::table('kategori')->insert([
            'nama_kategori' => $nama
        ]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /* =====================================
        EDIT (SELECT Query Builder)
    ====================================== */
    public function edit($id)
    {
        $kategori = DB::table('kategori')
                        ->where('idkategori', $id)
                        ->first();

        return view('admin.kategori.edit', compact('kategori'));
    }

    /* =====================================
        UPDATE (Query Builder)
    ====================================== */
    public function update(Request $request, $id)
    {
        $this->validateKategori($request);

        $nama = $this->formatNama($request->nama_kategori);

        DB::table('kategori')
            ->where('idkategori', $id)
            ->update([
                'nama_kategori' => $nama
            ]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    /* =====================================
        DELETE (Query Builder)
    ====================================== */
    public function destroy($id)
    {
        DB::table('kategori')
            ->where('idkategori', $id)
            ->delete();

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }

    /* =====================================
        VALIDATION
    ====================================== */
    private function validateKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);
    }

    /* =====================================
        HELPER
    ====================================== */
    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
