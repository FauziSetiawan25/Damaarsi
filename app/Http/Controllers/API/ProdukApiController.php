<?php

namespace App\Http\Controllers\API;

use App\Models\GambarProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdukApiController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function getAllProducts()
    {
        // Ambil semua produk beserta relasi
        $produk = Produk::with('gambarProduk')->get();

        return response()->json(['data' => $produk], 200);
    }

    public function getRecomenProducts()
    {
        $produk = Produk::with('gambarProduk')
        ->where('recomen', 'aktif')
        ->get();

        return response()->json(['data' => $produk], 200);
    }

    /**
     * Menampilkan jumlah produk.
     */
    public function getProductCount()
    {
        $count = Produk::count();
        return response()->json([
            'total_produk' => $count
        ]);
    }

    /**
     * (LIMIT) Menyimpan produk baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|string|in:Paket,Desain',
            'gambar1' => 'required|image|mimes:jpg,jpeg,png,gif',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $produk = Produk::create([
            'id_admin' => Auth::guard('admin')->user()->id,
            'nama_produk' => $request->nama_produk,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        $gambarFiles = ['gambar1', 'gambar2', 'gambar3'];
        foreach ($gambarFiles as $gambar) {
            if ($request->hasFile($gambar)) {
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $request->file($gambar)->storeAs('produk', $gambarName, 'public');
                GambarProduk::create([
                    'id_produk' => $produk->id,
                    'gambar' => $gambarName,
                ]);
            }
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan', 'data' => $produk], 201);
    }

    /**
     * Menampilkan produk berdasarkan ID.
     */
    public function show($id)
    {
        $produk = Produk::with('gambarProduk')->find($id);
        if ($produk) {
            return response()->json(['data' => $produk], 200);
        } else {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }
    }

    /**
     * (LIMIT) Memperbarui produk.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|string|in:Paket,Desain',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $produk = Produk::findOrFail($id);
        $produk->update([
            'id_admin' => Auth::guard('admin')->user()->id,
            'nama_produk' => $request->nama_produk,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // Update gambar jika ada perubahan
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3'];
        foreach ($gambarFiles as $key => $gambar) {
            if ($request->hasFile($gambar)) {
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $request->file($gambar)->storeAs('produk', $gambarName, 'public');

                $existingGambar = $produk->gambarProduk()->skip($key)->first();
                if ($existingGambar) {
                    Storage::disk('public')->delete('produk/' . $existingGambar->gambar);
                    $existingGambar->delete();
                }

                GambarProduk::updateOrCreate(
                    ['id_produk' => $produk->id, 'gambar' => $gambarName],
                    ['id_produk' => $produk->id, 'gambar' => $gambarName]
                );
            }
        }

        return response()->json(['message' => 'Produk berhasil diperbarui', 'data' => $produk], 200);
    }

    public function ubahRecomen(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->recomen = $request->status;
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Status produk berhasil diperbarui.',
            'data' => $produk
        ]);
    }

    /**
     * (LIMIT) Menghapus produk.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        foreach ($produk->gambarProduk as $gambar) {
            Storage::disk('public')->delete('produk/' . $gambar->gambar);
            $gambar->delete();
        }

        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
}