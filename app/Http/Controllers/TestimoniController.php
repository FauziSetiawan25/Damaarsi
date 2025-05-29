<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
class TestimoniController extends Controller
{
    /**
     * Menampilkan daftar testimoni dengan relasi produk.
     */
    public function index()
    {
        $testimonis = Testimoni::with('produk')->get();
        return view('admin.testimoni', compact('testimonis'));
    }
}