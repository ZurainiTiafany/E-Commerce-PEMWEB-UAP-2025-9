<?php

namespace App\Http\Controllers;

use App\Models\UserBalance;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function topupForm()
    {
        return view('wallet.topup');
    }

    public function generateVA(Request $request)
    {
        $balance = UserBalance::create([
            'user_id' => auth()->id(),
            'type' => 'topup',
            'amount' => $request->amount,
            'va_number' => rand(1000000000, 9999999999),
            'status' => 'pending',
        ]);

        return redirect()->route('payment.page', $balance->id);
    }
}