<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Memilih;

class BerandaController extends Controller
{
    /**
     * Menampilkan semua pengaturan web dan banner.
     */
    public function index()
    {
        $layanan = Layanan::all();
        $memilih = Memilih::all();
        return view('admin.beranda', compact('layanan', 'memilih'));
    }
}
