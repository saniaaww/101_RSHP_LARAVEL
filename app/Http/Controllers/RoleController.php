<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // Ambil semua data role dari tabel 'roles'
        $roles = Role::all();

        // Kirim data ke view
        return view('admin.role.index', compact('roles'));
    }
}
