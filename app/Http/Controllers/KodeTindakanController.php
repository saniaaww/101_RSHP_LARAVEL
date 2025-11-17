<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodeTindakanController extends Controller
{
    /* =====================================
        INDEX (JOIN + Query Builder)
    ====================================== */
    public function index()
    {
        $data = DB::table('kode_tindakan_terapi')
            ->join('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->join('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->select(
                'kode_tindakan_terapi.*',
                'kategori.nama_kategori',
                'kategori_klinis.nama_kategori_klinis'
            )
            ->get();

        return view('admin.kode_tindakan.index', compact('data'));
    }

    /* =====================================
        CREATE
    ====================================== */
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('admin.kode_tindakan.create', compact('kategori', 'kategoriKlinis'));
    }

    /* =====================================
        STORE (Insert)
    ====================================== */
    public function store(Request $request)
    {
        $this->validateInput($request);

        DB::table('kode_tindakan_terapi')->insert([
            'kode' => strtoupper($request->kode),
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /* =====================================
        EDIT (Select by ID)
    ====================================== */
    public function edit($id)
    {
        $data = DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->first();

        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('admin.kode_tindakan.edit', compact('data', 'kategori', 'kategoriKlinis'));
    }

    /* =====================================
        UPDATE
    ====================================== */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->update([
                'kode' => strtoupper($request->kode),
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /* =====================================
        DELETE
    ====================================== */
    public function destroy($id)
    {
        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->delete();

        return redirect()->route('admin.kode-tindakan.index')
            ->with('success', 'Data berhasil dihapus');
    }

    /* =====================================
        VALIDATION
    ====================================== */
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
