<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user dan relasi rolenya
        $users = User::with('role')->get();

        return view('admin.user.index', compact('users'));
    }
}
