<?php

namespace App\Http\Controllers;

use App\Models\GambarPortofolio;
use App\Models\Portofolio;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Menampilkan daftar portofolio beserta produk yang terkait.
     */
    public function index()
    {
        $portofolio = Portofolio::with(['produk', 'admin'])->get();
        $produk = Produk::all();
        return view('admin.portofolio', compact('portofolio', 'produk'));
    }

    /**
     * Menyimpan portofolio baru dan gambar terkait.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'gambar1' => 'required|image|mimes:jpg,jpeg,png,gif',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar4' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'nama_produk' => 'required|exists:produk,id',
            'tanggal_selesai' => 'required|date',
            'luas_bangunan' => 'required|numeric'
        ]);

        // Simpan portofolio
        $portofolio = Portofolio::create([
            'nama' => $request->nama_pemesan,
            'id_produk' => $request->nama_produk,
            'id_admin' => Auth::guard('admin')->user()->id,
            'tgl_selesai' => $request->tanggal_selesai,
            'luas' => $request->luas_bangunan,
        ]);

        // Simpan gambar
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3', 'gambar4'];
        foreach ($gambarFiles as $gambar) {
            if ($request->hasFile($gambar) && $request->file($gambar)->isValid()) {
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $gambarPath = $request->file($gambar)->storeAs('portofolio', $gambarName, 'public');
                GambarPortofolio::create([
                    'id_portofolio' => $portofolio->id,
                    'gambar' => $gambarName
                ]);
            }
        }

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil ditambahkan');
    }

    /**
     * Memperbarui portofolio dan gambar terkait.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'nama_produk' => 'required|exists:produk,id',
            'tanggal_selesai' => 'required|date',
            'luas_bangunan' => 'required|numeric',
        ]);

        // Cari portofolio yang ingin diupdate
        $portofolio = Portofolio::findOrFail($id);

        // Update data portofolio
        $portofolio->update([
            'nama' => $request->nama_pemesan,
            'id_produk' => $request->nama_produk,
            'id_admin' => Auth::guard('admin')->user()->id,
            'tgl_selesai' => $request->tanggal_selesai,
            'luas' => $request->luas_bangunan,
        ]);

        // Update gambar jika ada
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3', 'gambar4'];
        foreach ($gambarFiles as $index => $gambar) {
            if ($request->hasFile($gambar) && $request->file($gambar)->isValid()) {
                // Hapus gambar lama jika ada
                if ($portofolio->gambarPortofolio()->count() > $index) {
                    $oldGambar = $portofolio->gambarPortofolio()->skip($index)->first();
                    if ($oldGambar) {
                        Storage::disk('public')->delete('portofolio/' . $oldGambar->gambar);
                        $oldGambar->delete();
                    }
                }

                // Simpan gambar baru
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $gambarPath = $request->file($gambar)->storeAs('portofolio', $gambarName, 'public');

                // Simpan gambar baru ke tabel GambarPortofolio
                GambarPortofolio::create([
                    'id_portofolio' => $portofolio->id,
                    'gambar' => $gambarName
                ]);
            }
        }

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil diperbarui');
    }

    /**
     * Menghapus portofolio beserta gambar terkait.
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);

        if ($portofolio) {
            // Hapus gambar terkait dari storage dan database
            foreach ($portofolio->gambarPortofolio as $gambar) {
                Storage::disk('public')->delete('portofolio/' . $gambar->gambar);
                $gambar->delete();
            }

            // Hapus portofolio
            $portofolio->delete();

            return redirect()->route('admin.portofolio')->with('success', 'Portofolio dan gambar berhasil dihapus.');
        }

        return redirect()->route('admin.portofolio')->with('error', 'Portofolio tidak ditemukan.');
    }
}