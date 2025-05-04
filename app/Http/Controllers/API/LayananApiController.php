<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;

class LayananApiController extends Controller
{
    /**
     * Menampilkan semua layanan.
     */
    public function getAllLayanan()
    {
        $layanan = Layanan::all();

        return response()->json([
            'data' => $layanan
        ]);
    }

    /**
     * (LIMIT) Memperbarui layanan.
     */
    public function updateLayanan(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'required|string|max:255',
        ]);

        $layanan = Layanan::findOrFail($id);
        
        $layanan->update([
            // 'id_admin' => Auth::guard('admin')->user()->id,
            // 'id_admin' => 1,
            'title' => $request->title,
            'gambar' => $request->gambar,
        ]);

        return response()->json([
            'message' => 'Layanan berhasil diperbarui',
            'data' => $layanan
        ]);
    }
}