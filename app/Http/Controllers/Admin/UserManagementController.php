<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
