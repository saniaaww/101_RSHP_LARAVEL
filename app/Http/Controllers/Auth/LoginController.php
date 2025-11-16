<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cari user + relasi role aktif
        $user = User::with(['roleUser' => function ($q) {
            $q->where('status', 1);
        }, 'roleUser.role'])
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        // Login Laravel
        Auth::login($user);

        // Ambil role aktif
        $roleAktif = $user->roleUser->first();
        $userRole = $roleAktif->idrole ?? null;
        $namaRole = $roleAktif->role->nama_role ?? 'User';

        // Simpan session custom
        $request->session()->put([
            'user_id'    => $user->iduser,
            'user_name'  => $user->nama,
            'user_email' => $user->email,
            'user_role'  => $userRole,
            'user_role_name' => $namaRole,
            'user_status'    => $roleAktif->status ?? 1,
        ]);

        // Redirect berdasarkan role
        switch ($userRole) {
            case 1:
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            case 6:
                return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil!');
            case 7:
                return redirect()->route('perawat.dashboard')->with('success', 'Login berhasil!');
            case 4:
                return redirect()->route('resepsionis.dashboard')->with('success', 'Login berhasil!');
            case 8:
                return redirect()->route('pemilik.dashboard')->with('success', 'Login berhasil!');
            default:
                return redirect('/')->with('success', 'Login berhasil!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
