<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\UserBalance;
use App\Models\StoreBalance;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Halaman form
    public function index()
    {
        return view('payment.index');
    }

    // Cek kode VA yang dimasukkan user
    public function checkVA(Request $request)
    {
        // cek VA untuk topup
        $topup = UserBalance::where('va_number', $request->va)->first();

        if ($topup) {
            return view('payment.confirm', [
                'type' => 'topup',
                'data' => $topup
            ]);
        }

        // cek VA untuk transaksi
        $trx = Transaction::where('va_number', $request->va)->first();
        if ($trx) {
            return view('payment.confirm', [
                'type' => 'purchase',
                'data' => $trx
            ]);
        }

        return back()->with('error', 'Kode VA tidak ditemukan');
    }

    // Konfirmasi pembayaran
    public function confirmPayment(Request $request)
    {
        if ($request->type === 'topup') {
            $balance = UserBalance::find($request->id);

            $balance->update(['status' => 'success']);

            // Tambah saldo ke user
            $balance->user->increment('balance', $balance->amount);

            return redirect('/wallet')->with('success', 'Topup berhasil!');
        }

        if ($request->type === 'purchase') {
            $trx = Transaction::find($request->id);

            $trx->update(['payment_status' => 'paid']);

            // Tambah saldo ke store
            StoreBalance::addToStore($trx->store_id, $trx->grand_total);

            return redirect('/history')->with('success', 'Pembayaran berhasil!');
        }
    }
}