<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerWithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::where('store_id', Auth::user()->store->id)->get();
        return view('seller.withdrawals.index', compact('withdrawals'));
    }

    public function store(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:10000']);

        Withdrawal::create([
            'store_id' => Auth::user()->store->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Permintaan penarikan dikirim.');
    }
}
