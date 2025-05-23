<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    /**
     * Menampilkan daftar testimoni dengan relasi produk.
     */
    public function index()
    {
        $testimonis = Testimoni::with('produk')->get();
        return view('admin.testimoni', compact('testimonis'));
    }

    /**
     * Mengubah status testimoni (aktif/tidak aktif).
     */
    // public function ubahStatus(Request $request, $id)
    // {
    //     $testimoni = Testimoni::findOrFail($id);
    //     $testimoni->status = $request->status;
    //     $testimoni->save();
    //     return redirect()->back()->with('success', 'Status testimoni berhasil diperbarui.');
    // }

    /**
     * Menampilkan form untuk membuat testimoni baru.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('admin.addtesti', compact('produks'));
    }

    /**
     * Menyimpan testimoni baru ke database setelah validasi dan upload gambar.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'testimoni' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->storeAs('testimoni', $imageName, 'public');
            Testimoni::create([
                'nama' => $request->nama,
                'testimoni' => $request->testimoni,
                'gambar' => $imageName,
            ]);
        }

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete('testimoni/' . $testimoni->gambar);

        // Hapus data testimoni
        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus');
    }

}