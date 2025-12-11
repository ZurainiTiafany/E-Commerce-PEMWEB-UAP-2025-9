<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerBalanceController extends Controller
{
    public function index()
    {
        $store = Auth::user()->store;
        $balance = $store->storeBallance;
        $history = $store->storeBallance->histories ?? [];

        return view('seller.balance.index', compact('balance', 'history'));
    }
}