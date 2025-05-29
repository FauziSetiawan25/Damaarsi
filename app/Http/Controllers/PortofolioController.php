<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Produk;

class PortofolioController extends Controller
{
    /**
     * Menampilkan daftar portofolio beserta produk yang terkait.
     */
    public function index()
    {
        $portofolio = Portofolio::with(['produk', 'admin'])->get();
        $produk = Produk::all();
        return view('admin.portofolio', compact('portofolio', 'produk'));
    }
}