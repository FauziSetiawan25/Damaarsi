<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Alasan;
use App\Models\Memilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Memperbarui pengaturan web berdasarkan ID.
     */
    public function updateLayanan(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->title = $request->input('nama_layanan');
        $layanan->gambar = $request->input('gambar');
        $layanan->save();

        return redirect()->back()->with('success', 'Beranda Layanan berhasil diperbarui');
    }

    /**
     * Memperbarui pengaturan web berdasarkan ID.
     */
    public function updateMemilih(Request $request, $id)
    {
        $memilih = Memilih::findOrFail($id);
        $memilih->title = $request->input('nama_memilih');
        $memilih->gambar = $request->input('gambar');
        $memilih->save();

        return redirect()->back()->with('success', 'Memilih berhasil diperbarui');
    }
}
