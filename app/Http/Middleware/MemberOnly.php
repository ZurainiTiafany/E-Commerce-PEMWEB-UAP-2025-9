<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberOnly
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        // Jika admin → redirect ke dashboard admin
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Akses ditolak.');
        }

        

        // Jika user.role = 'member' → lanjutkan
        if ($user->isMember()) {
            return $next($request);
        }

        // fallback
        return abort(403, 'Akses tidak diizinkan.');
    }
}
