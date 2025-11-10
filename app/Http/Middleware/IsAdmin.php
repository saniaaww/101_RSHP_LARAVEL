<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah punya relasi roleUser dan role Administrator
        if ($user->roleUser()->whereHas('role', function ($q) {
            $q->where('nama_role', 'Administrator');
        })->exists()) {
            return $next($request);
        }

        // Jika bukan admin, arahkan kembali ke login
        return redirect('/login')->with('error', 'Akses ditolak! Anda bukan admin.');
    }
}
