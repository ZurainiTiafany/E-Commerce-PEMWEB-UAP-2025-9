<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreManagementController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('admin.stores.index', compact('stores'));
    }
}
