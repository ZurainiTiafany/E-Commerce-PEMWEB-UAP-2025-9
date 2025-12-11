<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->store->transactions;
        return view('seller.orders.index', compact('orders'));
    }

    public function updateStatus($id)
    {
        $order = Auth::user()->store->transactions()->findOrFail($id);
        $order->update(['status' => request('status')]);

        return back();
    }
}