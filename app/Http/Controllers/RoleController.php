<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /* ============================================================
       INDEX (Query Builder)
    ============================================================ */
    public function index()
    {
        $role = DB::table('role')->get();
        return view('admin.role.index', compact('role'));
    }

    /* ============================================================
       CREATE
    ============================================================ */
    public function create()
    {
        return view('admin.role.create');
    }

    /* ============================================================
       STORE (Insert Query Builder)
    ============================================================ */
    public function store(Request $request)
    {
        $this->validateRole($request);

        $nama = $this->formatNama($request->nama_role);

        DB::table('role')->insert([
            'nama_role' => $nama
        ]);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil ditambahkan');
    }

    /* ============================================================
       EDIT (Select by ID)
    ============================================================ */
    public function edit($id)
    {
        $role = DB::table('role')
                    ->where('idrole', $id)
                    ->first();

        return view('admin.role.edit', compact('role'));
    }

    /* ============================================================
       UPDATE (Query Builder)
    ============================================================ */
    public function update(Request $request, $id)
    {
        $this->validateRole($request);

        $nama = $this->formatNama($request->nama_role);

        DB::table('role')
            ->where('idrole', $id)
            ->update([
                'nama_role' => $nama
            ]);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil diperbarui');
    }

    /* ============================================================
       DELETE (Query Builder)
    ============================================================ */
    public function destroy($id)
    {
        DB::table('role')
            ->where('idrole', $id)
            ->delete();

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil dihapus');
    }

    /* ============================================================
       VALIDATION
    ============================================================ */
    private function validateRole(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100'
        ]);
    }

    /* ============================================================
       HELPER
    ============================================================ */
    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
