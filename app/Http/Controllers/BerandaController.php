<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Alasan;
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
        $alasan = Alasan::all();
        return view('admin.beranda', compact('layanan', 'alasan'));
    }

    /**
     * Memperbarui pengaturan web berdasarkan ID.
     */
    public function updateLayanan(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->nama_layanan = $request->input('nama_layanan');
        $layanan->gambar = $request->input('gambar');
        $layanan->save();

        return redirect()->back()->with('success', 'Beranda Layanan berhasil diperbarui');
    }

    /**
     * Memperbarui pengaturan web berdasarkan ID.
     */
    public function updateAlasan(Request $request, $id)
    {
        $alasan = Alasan::findOrFail($id);
        $alasan->nama_alasan = $request->input('nama_alasan');
        $alasan->gambar = $request->input('gambar');
        $alasan->save();

        return redirect()->back()->with('success', 'Alasan berhasil diperbarui');
    }

    
}
