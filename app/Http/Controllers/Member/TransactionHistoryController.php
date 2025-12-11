<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $history = Transaction::where('buyer_id', auth()->id())
            ->latest()
            ->get();

        return view('history.index', compact('history'));
    }

    public function show($id)
    {
        $transaction = Transaction::with('details.product')
            ->where('buyer_id', auth()->id())
            ->findOrFail($id);

        return view('history.show', compact('transaction'));
    }
}