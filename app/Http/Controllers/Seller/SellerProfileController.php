<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProfileController extends Controller
{
    public function index()
    {
        $store = Auth::user()->store;
        return view('seller.profile.index', compact('store'));
    }

    public function update(Request $request)
    {
        $store = Auth::user()->store;

        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $store->update($request->all());

        return back()->with('success', 'Profil toko berhasil diperbarui');
    }

    public function delete()
    {
        $store = Auth::user()->store;
        $store->delete();
        return redirect()->route('dashboard');
    }
}