<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\PengaturanBanner;
use App\Models\PengaturanWeb;

class PengaturanBannerApiController extends Controller
{
    /**
     * Menampilkan semua pengaturan banner.
     */
    public function getAllPBanner()
    {
        $banners = PengaturanBanner::all();

        return response()->json([
            'banners' => $banners
        ]);
    }

    public function getBannerActive()
    {
        $banners = PengaturanBanner::where('status', 'aktif')->get();

        return response()->json([
            'banners' => $banners
        ]);
    }


    /**
     * (LIMIT) Mengubah status banner (aktif/nonaktif).
     */
    public function ubahStatus(Request $request, $id)
    {
        $banner = PengaturanBanner::findOrFail($id);
        $banner->status = $request->status;
        $banner->save();

        return response()->json([
            'success' => true,
            'message' => 'Status banner berhasil diperbarui.',
            'data' => $banner
        ]);
    }


    /**
     * Menampilkan banner berdasarkan ID.
     */
    public function show($id)
    {
        $banner = PengaturanBanner::find($id);

        if (!$banner) {
            return response()->json([
                'message' => 'Banner tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'banner' => $banner
        ]);
    }

     /**
     * (LIMIT) Memperbarui banner.
     */
    public function updateBanner(Request $request, $id)
    {
        $banner = PengaturanBanner::findOrFail($id);
        $banner->title = $request->input('title');
        $banner->deskripsi = $request->input('deskripsi');
        $banner->link = $request->input('link');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($banner->gambar) {
                Storage::disk('public')->delete('banner/' . $banner->gambar);
            }

            // Simpan gambar baru dalam folder 'banner/' dan database
            $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $imagePath = $request->file('gambar')->storeAs('banner', $imageName, 'public'); // Menyimpan gambar di dalam folder banner/
            $banner->gambar = $imageName;
        }

        $banner->save();

        return response()->json([
            'success' => true,
            'message' => 'Banner berhasil diperbarui!',
            'data' => $banner
        ]);
    }
}