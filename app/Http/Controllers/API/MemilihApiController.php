<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Layanan;
use App\Models\Memilih;
use App\Models\PengaturanBanner;
use App\Models\PengaturanWeb;

class MemilihApiController extends Controller
{
    /**
     * Menampilkan semua alasan dalam bentuk JSON.
     */
    public function getAllMemilih()
    {
        $memilih = Memilih::all();

        return response()->json([
            'data' => $memilih
        ]);
    }

    /**
     * Memperbarui alasan berdasarkan ID dan mengembalikan respons JSON.
     */
    public function updateMemilih(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'required|string|max:255',
        ]);

        $memilih = Memilih::findOrFail($id);
        
        $memilih->update([
            // 'id_admin' => Auth::guard('admin')->user()->id,
            'id_admin' => 1,
            'title' => $request->title,
            'gambar' => $request->gambar,
        ]);

        return response()->json([
            'message' => 'Alasan memilih berhasil diperbarui',
            'data' => $memilih
        ]);
    }
}