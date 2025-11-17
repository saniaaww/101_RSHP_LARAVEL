<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    /* =====================================
        INDEX (Query Builder)
    ====================================== */
    public function index()
    {
        $jenis = DB::table('jenis_hewan')->get();
        return view('admin.jenis.index', compact('jenis'));
    }

    /* =====================================
        CREATE
    ====================================== */
    public function create()
    {
        return view('admin.jenis.create');
    }

    /* =====================================
        STORE (INSERT - Query Builder)
    ====================================== */
    public function store(Request $request)
    {
        $this->validateJenis($request);

        $nama = $this->formatNama($request->nama_jenis_hewan);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $nama
        ]);

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil disimpan!');
    }

    /* =====================================
        EDIT (Select by id - Query Builder)
    ====================================== */
    public function edit($id)
    {
        $jenis = DB::table('jenis_hewan')
                    ->where('idjenis_hewan', $id)
                    ->first();

        return view('admin.jenis.edit', compact('jenis'));
    }

    /* =====================================
        UPDATE (Query Builder)
    ====================================== */
    public function update(Request $request, $id)
    {
        $this->validateJenis($request);

        $nama = $this->formatNama($request->nama_jenis_hewan);

        DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->update([
                'nama_jenis_hewan' => $nama
            ]);

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    /* =====================================
        DELETE (Query Builder)
    ====================================== */
    public function destroy($id)
    {
        DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->delete();

        return redirect()->route('admin.jenis.index')
                         ->with('success', 'Data berhasil dihapus!');
    }

    /* =====================================
        VALIDATION
    ====================================== */
    private function validateJenis($request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|max:100'
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
