<?php

namespace App\Http\Controllers\API;

use App\Models\GambarProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\GambarPortofolio;
use App\Models\Portofolio;

class PortofolioApiController extends Controller
{
    /**
     * Menampilkan daftar portofolio yang ada.
     */
    public function getAllPortofolio()
    {
        $portofolio = Portofolio::with('gambarPortofolio', 'produk', 'admin')->get();
        return response()->json(['data' => $portofolio], 200);
    }

    /**
     * Menyimpan portofolio baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemesan' => 'required|string|max:255',
            // 'gambar1' => 'required|image|mimes:jpg,jpeg,png,gif',
            'gambar1' => 'required|string',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar4' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'nama_produk' => 'required|exists:produk,id',
            'tanggal_selesai' => 'required|date',
            'luas_bangunan' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Menyimpan portofolio baru
        $portofolio = Portofolio::create([
            'nama' => $request->nama_pemesan,
            'id_produk' => $request->nama_produk,
            // 'id_admin' => Auth::guard('admin')->user()->id,
            'id_admin' => 1,
            'tgl_selesai' => $request->tanggal_selesai,
            'luas' => $request->luas_bangunan,
        ]);

        // Menyimpan gambar portofolio
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

        return response()->json(['message' => 'Portofolio berhasil ditambahkan', 'data' => $portofolio], 201);
    }

    /**
     * Menampilkan informasi detail portofolio tertentu (tidak digunakan dalam controller ini).
     */
    public function show($id)
    {
        // Menampilkan portofolio berdasarkan ID
        $portofolio = Portofolio::with('gambarPortofolio', 'produk', 'admin')->find($id);
        if ($portofolio) {
            return response()->json(['data' => $portofolio], 200);
        } else {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }
    }

    /**
     * Memperbarui portofolio yang ada di penyimpanan.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemesan' => 'required|string|max:255',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gambar4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'nama_produk' => 'required|exists:produk,id',
            'tanggal_selesai' => 'required|date',
            'luas_bangunan' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $portofolio = Portofolio::findOrFail($id);
        // $portofolio->update($request->only(['nama_produk', 'tipe', 'harga', 'deskripsi']));
        // Update data portofolio
        $portofolio->update([
            'nama' => $request->nama_pemesan,
            'id_produk' => $request->nama_produk,
            // 'id_admin' => Auth::guard('admin')->user()->id,
            'id_admin' => 1,
            'tgl_selesai' => $request->tanggal_selesai,
            'luas' => $request->luas_bangunan,
        ]);

        // Update gambar jika ada perubahan
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3', 'gambar4'];
        $gambarPaths = [];

        foreach ($gambarFiles as $index => $gambar) {
            if ($request->hasFile($gambar) && $request->file($gambar)->isValid()) {
                // Hapus gambar lama jika ada
                $oldGambar = $portofolio->gambarPortofolio()->skip($index)->first();
                if ($oldGambar) {
                    Storage::disk('public')->delete('portofolio/' . $oldGambar->gambar);
                    $oldGambar->delete();
                }

                // Simpan gambar baru
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $gambarPath = $request->file($gambar)->storeAs('portofolio', $gambarName, 'public');

                // Simpan ke database
                $gambarBaru = GambarPortofolio::create([
                    'id_portofolio' => $portofolio->id,
                    'gambar' => $gambarName
                ]);

                $gambarPaths[] = asset('storage/portofolio/' . $gambarName);
            }
        }
        return response()->json(['message' => 'Portofolio berhasil diperbarui', 'data' => $portofolio], 200);
    }

    /**
     * Menghapus portofolio dari penyimpanan.
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);

        if (!$portofolio) {
            return response()->json(['error' => 'Portofolio tidak ditemukan'], 404);
        }

        // Menghapus gambar terkait portofolio
        foreach ($portofolio->gambarPortofolio as $gambar) {
            Storage::disk('public')->delete('portofolio/' . $gambar->gambar);
            $gambar->delete();
        }

        // Menghapus portofolio dari database
        $portofolio->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
}