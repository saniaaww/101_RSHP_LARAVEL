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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi update (email unik tapi abaikan email user itu sendiri)
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $id . ',iduser',
            'password' => 'nullable|min:6'
        ]);

        // Update nama dan email
        $user->nama = $this->formatNama($request->nama);
        $user->email = $request->email;

        // Update password kalau diisi
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil dihapus');
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
