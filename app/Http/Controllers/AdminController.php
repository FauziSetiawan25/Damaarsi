<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan statistik pelanggan dan produk.
     * 
     * @return Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Menampilkan data admin dengan status 'admin' dan 'nonaktif'.
     */
    public function show()
    {
        $admins = Admin::whereIn('role', ['admin', 'nonaktif'])->get();
        return view('admin.dataadmin', compact('admins'));
    }
}
