<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreVerificationController extends Controller
{
    public function index()
    {
        $stores = Store::where('is_verified', false)->get();

        return view('admin.verification.index', compact('stores'));
    }

    public function approve($id)
    {
        $store = Store::findOrFail($id);
        $store->update([
            'is_verified' => true,
            'verification_note' => 'Toko telah diverifikasi oleh admin.'
        ]);

        return redirect()->back()->with('success', 'Toko berhasil diverifikasi!');
    }

    public function reject(Request $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->update([
            'is_verified' => false,
            'verification_note' => $request->reason
        ]);

        return redirect()->back()->with('error', 'Toko ditolak!');
    }
}

