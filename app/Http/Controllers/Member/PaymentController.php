<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserBalance;
use App\Models\StoreBalance;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('member.payment.index'); // optional: page input VA
    }

    // tampilkan halaman VA untuk transaksi
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('member.payment.pay', compact('transaction'));
    }

    // proses simulasi bayar dari halaman pay (route POST member.payment.process)
    public function confirmPayment(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        // jika sudah paid, redirect
        if ($transaction->payment_status === 'paid') {
            return redirect()->route('member.transactions.index')->with('info', 'Transaksi sudah dibayar.');
        }

        // set paid
        $transaction->update(['payment_status' => 'paid']);

        // masukkan ke store balance
        StoreBalance::addToStore($transaction->store_id, $transaction->grand_total);

        return redirect()->route('member.transactions.index')->with('success', 'Pembayaran berhasil!');
    }

    // checkVA digunakan untuk halaman payment hub (cek VA) — optional
    public function checkVA(Request $request)
    {
        $topup = UserBalance::where('va_number', $request->va)->first();
        if ($topup) {
            return view('member.payment.confirm', ['type'=>'topup','data'=>$topup]);
        }

        $trx = Transaction::where('va_number', $request->va)->first();
        if ($trx) {
            return view('member.payment.confirm', ['type'=>'purchase','data'=>$trx]);
        }

        return back()->with('error','Kode VA tidak ditemukan');
    }
    public function confirmVA($type, $id)
{
    // =========================
    // PEMBAYARAN TOPUP SALDO
    // =========================
    if ($type === 'topup') {

        $topup = UserBalance::findOrFail($id);

        if ($topup->status === 'paid') {
            return back()->with('error', 'Topup sudah diproses.');
        }

        // ubah status jadi paid
        $topup->update(['status' => 'paid']);

        // tambahkan ke saldo user
        $user = $topup->user;
        $user->balance->update([
            'balance' => $user->balance->balance + $topup->amount
        ]);

        return redirect()->route('member.payment.index')
            ->with('success', 'Topup berhasil! Saldo bertambah.');
    }

    // =========================
    // PEMBAYARAN TRANSAKSI PRODUK
    // =========================
    if ($type === 'purchase') {

        $trx = Transaction::findOrFail($id);

        if ($trx->payment_status === 'paid') {
            return back()->with('error', 'Transaksi sudah dibayar.');
        }

        // ubah status jadi paid
        $trx->update(['payment_status' => 'paid']);

        // tambah ke store balance
        StoreBalance::addToStore($trx->store_id, $trx->grand_total);

        return redirect()->route('member.payment.index')
            ->with('success', 'Pembayaran berhasil!');
    }

    return back()->with('error', 'Jenis pembayaran tidak valid.');
}
}