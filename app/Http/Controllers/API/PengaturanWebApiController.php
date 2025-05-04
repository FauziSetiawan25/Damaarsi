<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengaturanWeb;

class PengaturanWebApiController extends Controller
{
    /**
     * Menampilkan semua pengaturan web.
     */
    public function getAllPWeb()
    {
        $pengaturan = PengaturanWeb::all();

        return response()->json([
            'pengaturan' => $pengaturan
        ]);
    }

    /**
     *  Menampilkan pengaturan web berdasarkan keterangan.
     */
    public function showByKeterangan($keterangan)
    {
        $pengaturan = PengaturanWeb::where('keterangan', $keterangan)->first();

        if (!$pengaturan) {
            return response()->json([
                'message' => 'Data dengan keterangan tersebut tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'pengaturan' => $pengaturan
        ]);
    }

    /**
     * (LIMIT) Memperbarui pengaturan web.
     */
    public function updatePengaturan(Request $request, $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);
        $pengaturan->value = $request->input('value');
        $pengaturan->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan web berhasil diperbarui.',
            'data' => $pengaturan
        ]);
    }
}