<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPerawat
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) return redirect('/login');

        $user = Auth::user();
        if ($user->roleUser()->whereHas('role', fn($q) => $q->where('nama_role', 'Perawat'))->exists()) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak!');
    }
}
