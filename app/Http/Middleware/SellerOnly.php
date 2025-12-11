<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Jika belum login
        if (!$user) {
            return redirect('/login')->with('error', 'Silahkan login dulu.');
        }

        // Jika bukan seller
        if ($user->role !== 'seller') {
            abort(403, 'Akses ditolak. Ini hanya untuk Seller.');
        }

        return $next($request);
    }
}
