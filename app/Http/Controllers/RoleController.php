<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validateRole($request);

        $nama = $this->formatNama($request->nama_role);

        $this->createRole($nama);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil ditambahkan');
    }

    /* -------------------------
       VALIDASI
    -------------------------- */
    private function validateRole(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100'
        ]);
    }

    /* -------------------------
       HELPER
    -------------------------- */
    private function createRole($nama)
    {
        Role::create([
            'nama_role' => $nama
        ]);
    }

    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
