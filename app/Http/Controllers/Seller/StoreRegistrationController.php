<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreRegistrationController extends Controller
{
    public function showForm()
    {
        return view('seller.store-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image',
            'about' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $logoPath = $request->hasFile('logo')
            ? $request->file('logo')->store('logos', 'public')
            : null;

        Store::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'logo' => $logoPath,
            'about' => $request->about,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'Toko berhasil didaftarkan.');
    }
}