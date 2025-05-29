<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk yang ada.
     */
    public function index()
    {
        $produk = Produk::with('gambarProduk', 'admin')->get();
        return view('admin.produk', compact('produk'));
    }
}