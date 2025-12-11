<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung jumlah user
        $totalUsers = User::count();

        // Hitung jumlah store
        $totalStores = Store::count();

        // Hitung store dengan is_verified = false
        $pendingStores = Store::where('is_verified', false)->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalStores',
            'pendingStores'
        ));
}
}
