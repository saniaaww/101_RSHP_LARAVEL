<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create() {
        return view('admin.role.create');
    }

    public function store(Request $request) {
        $validated = $this->validateRole($request);
        $validated['nama_role'] = $this->formatNama($validated['nama_role']);
        $this->createRole($validated);
        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    private function validateRole($request) {
        return $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role'
        ]);
    }

    private function createRole($data) {
        Role::create($data);
    }

    private function formatNama($nama) {
        return ucwords(strtolower($nama));
    }
}
