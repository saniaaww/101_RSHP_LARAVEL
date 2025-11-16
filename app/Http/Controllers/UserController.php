<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        $this->createUser($request);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /* -------------------------
       VALIDASI
    -------------------------- */
    private function validateUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6'
        ]);
    }

    /* -------------------------
       HELPER
    -------------------------- */
    private function createUser(Request $request)
    {
        User::create([
            'nama' => $this->formatNama($request->nama),
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }

    private function formatNama($nama)
    {
        return ucwords(strtolower($nama));
    }
}
