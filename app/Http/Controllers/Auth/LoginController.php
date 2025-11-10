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
    public function __construct()
    {
        // Hanya guest yang boleh akses login, kecuali logout
        $this->middleware('guest')->except('logout');
    }

    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil user berdasarkan email
        $user = User::with(['roleUser.role'])
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        // Login user ke sistem
        Auth::login($user);

        // Ambil role aktif user (status = 1)
        $roleAktif = $user->roleUser->firstWhere('status', 1);
        $namaRole = $roleAktif ? $roleAktif->role->nama_role : 'User';

        // Simpan ke session
        $request->session()->put([
            'user_id'        => $user->iduser,
            'user_name'      => $user->nama,
            'user_email'     => $user->email,
            'user_role_id'   => $roleAktif->idrole ?? null,
            'user_role_name' => $namaRole,
        ]);

        // Redirect sesuai role
        switch ($namaRole) {
            case 'Administrator':
                return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang, Admin!');
            case 'Dokter':
                return redirect()->intended('/dokter/dashboard')->with('success', 'Selamat datang, Dokter!');
            case 'Perawat':
                return redirect()->intended('/perawat/dashboard')->with('success', 'Selamat datang, Perawat!');
            case 'Resepsionis':
                return redirect()->intended('/resepsionis/dashboard')->with('success', 'Selamat datang, Resepsionis!');
            case 'Pemilik':
                return redirect()->intended('/pemilik/dashboard')->with('success', 'Selamat datang, Pemilik!');
            default:
                return redirect()->intended('/')->with('success', 'Login berhasil!');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
