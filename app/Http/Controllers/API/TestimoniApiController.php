<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Validator;

class TestimoniApiController extends Controller
{
    /**
     * Menampilkan daftar portofolio yang ada.
     */
    public function getAllTestimoni()
    {
        $testimonis = Testimoni::with('produk')->get();
        return response()->json(['data' => $testimonis], 200);
    }

    public function ubahStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean'
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = $request->status;
        $testimoni->save();

        return response()->json([
            'message' => 'Status testimoni berhasil diperbarui',
            'testimoni' => $testimoni
        ], 200);
    }

    /**
     * Menyimpan portofolio baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_produk' => 'required|exists:produk,id',
            'nama' => 'required|string|max:255',
            'testimoni' => 'required|string',
            // 'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            'gambar' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $imageName = uniqid() . '.' . $request->gambar;
        $testimoni = Testimoni::create([
            'id_produk' => $request->id_produk,
            'nama' => $request->nama,
            'testimoni' => $request->testimoni,
            'gambar' => $imageName,
        ]);

        return response()->json(['message' => 'Testimoni berhasil ditambahkan', 'data' => $testimoni], 200);


        // if ($request->hasFile('gambar')) {
        //     $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
        //     $request->file('gambar')->storeAs('testimoni', $imageName, 'public');

        //     $testimoni = Testimoni::create([
        //         'id_produk' => $request->id_produk,
        //         'nama' => $request->nama,
        //         'testimoni' => $request->testimoni,
        //         'gambar' => $imageName,
        //     ]);

        //     return response()->json([
        //         'message' => 'Testimoni berhasil ditambahkan',
        //         'testimoni' => $testimoni
        //     ], 201);
        // }

        // return response()->json(['message' => 'Gambar tidak valid'], 400);
    }

    /**
     * Menampilkan informasi detail portofolio tertentu (tidak digunakan dalam controller ini).
     */
    public function show($id)
    {
        // Menampilkan portofolio berdasarkan ID
        $testimoni = Testimoni::with('produk')->find($id);
        if ($testimoni) {
            return response()->json(['data' => $testimoni], 200);
        } else {
            return response()->json(['error' => 'Testimoni tidak ditemukan'], 404);
        }
    }

    /**
     * Menghapus portofolio dari penyimpanan.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete('testimoni/' . $testimoni->gambar);

        // Hapus data testimoni
        $testimoni->delete();

        return response()->json([
            'message' => 'Testimoni berhasil dihapus'
        ], 200);
    }
}