<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;

class LayananApiController extends Controller
{
    /**
     * Menampilkan semua layanan.
     */
    public function getAllLayanan()
    {
        $layanan = Layanan::all();
        return response()->json(['data' => $layanan]);
    }

    /**
     * (LIMIT) Memperbarui layanan.
     */
    public function updateLayanan(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'nullable|file|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);
        
        // Handle upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar) {
                Storage::disk('public')->delete('layanan/' . $layanan->gambar);
            }

            $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('layanan', $imageName, 'public');

            $layanan->gambar = $imageName;
        }

        $layanan->title = $request->title;
        $layanan->save();

        return response()->json([
            'message' => 'Layanan berhasil diperbarui',
            'data' => $layanan
        ]);
    }
}