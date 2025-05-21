<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Memilih;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemilihApiController extends Controller
{
    /**
     * Menampilkan semua alasan memilih.
     */
    public function getAllMemilih()
    {
        $memilih = Memilih::all();

        return response()->json([
            'data' => $memilih
        ]);
    }

    /**
     * (LIMIT) Memperbarui alasan memilih.
     */
    public function updateMemilih(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'gambar' => 'nullable|file|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $memilih = Memilih::findOrFail($id);

        // Handle upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($memilih->gambar) {
                Storage::disk('public')->delete('memilih/' . $memilih->gambar);
            }

            // Simpan gambar baru ke folder 'memilih/' di disk 'public'
            $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('memilih', $imageName, 'public');

            $memilih->gambar = $imageName;
        }

        // Update title dan id_admin (hardcoded 1, sesuaikan jika pakai Auth)
        $memilih->title = $request->title;
        $memilih->save();

        return response()->json([
            'message' => 'Alasan memilih berhasil diperbarui',
            'data' => $memilih
        ]);
    }
}