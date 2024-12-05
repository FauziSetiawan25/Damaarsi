<?php

namespace App\Http\Controllers;

use App\Models\PengaturanBanner;
use App\Models\PengaturanWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Menampilkan semua pengaturan web dan banner.
     */
    public function index()
    {
        $pengaturan = PengaturanWeb::all();
        $banners = PengaturanBanner::all();
        return view('admin.pengaturan', compact('pengaturan', 'banners'));
    }

    /**
     * Mengubah status banner (aktif/nonaktif).
     */
    public function ubahStatus(Request $request, $id)
    {
        $testimoni = PengaturanBanner::findOrFail($id);
        $testimoni->status = $request->status;
        $testimoni->save();

        return redirect()->back()->with('success', 'Status banner berhasil diperbarui.');
    }

    /**
     * Memperbarui pengaturan web berdasarkan ID.
     */
    public function updatePengaturan(Request $request, $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);
        $pengaturan->keterangan = $request->input('keterangan');
        $pengaturan->value = $request->input('value');
        $pengaturan->save();

        return redirect()->back()->with('success', 'Pengaturan web berhasil diperbarui');
    }

    /**
     * Memperbarui banner, termasuk mengganti gambar jika ada.
     */
    public function updateBanner(Request $request, $id)
    {
        // Validasi dan update banner
        $banner = PengaturanBanner::findOrFail($id);
        $banner->title = $request->input('title');
        $banner->deskripsi = $request->input('deskripsi');
        $banner->link = $request->input('link');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($banner->gambar) {
                Storage::disk('public')->delete('banner/' . $banner->gambar);
            }
    
            // Simpan gambar baru dalam folder 'banner/ dan database'
            $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $imagePath = $request->file('gambar')->storeAs('banner', $imageName, 'public'); // Menyimpan gambar di dalam folder banner/
            $banner->gambar = $imageName;
        }

        $banner->save();

        return redirect()->route('admin.pengaturan')->with('success', 'Banner berhasil diperbarui!');
    }
}