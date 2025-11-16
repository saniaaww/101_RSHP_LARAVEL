<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        // Cek apakah user memiliki role sesuai parameter
        $hasRole = $user->roleUser()
                        ->whereHas('role', function ($q) use ($role) {
                            $q->where('nama_role', ucfirst($role));
                        })
                        ->exists();

        if (!$hasRole) {
            abort(403, 'Unauthorized: Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
