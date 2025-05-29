<?php

namespace App\Http\Controllers;

use App\Models\PengaturanBanner;
use App\Models\PengaturanWeb;

class PengaturanController extends Controller
{
    /**
     * Menampilkan semua pengaturan web dan banner.
     */
    public function index()
    {
        $pengaturan = PengaturanWeb::all();
        $banners = PengaturanBanner::all();
        return view('admin.pengaturan', compact('pengaturan', 'banners'));
    }
}