<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk yang ada.
     */
    public function index()
    {
        // Mengambil produk beserta gambar dan admin yang terkait
        $produk = Produk::with('gambarProduk', 'admin')->get();
        // Mengembalikan view dengan data produk
        return view('admin.produk', compact('produk'));
    }

    /**
     * Menyimpan produk baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            // 'tipe' => 'required|string|in:Paket,Desain',
            'gambar1' => 'required|image|mimes:jpg,jpeg,png,gif',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        // Membuat produk baru dan menyimpannya ke database
        $produk = Produk::create([
            'id_admin' => Auth::guard('admin')->user()->id,
            'nama_produk' => $request->nama_produk,
            // 'tipe' => $request->tipe,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // Menyimpan gambar produk yang diupload
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3'];
        foreach ($gambarFiles as $gambar) {
            if ($request->hasFile($gambar) && $request->file($gambar)->isValid()) {
                // Membuat nama unik untuk gambar
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                // Menyimpan gambar ke direktori publik 'produk'
                $gambarPath = $request->file($gambar)->storeAs('produk', $gambarName, 'public');
                // Menyimpan informasi gambar ke tabel GambarProduk
                GambarProduk::create([
                    'id_produk' => $produk->id,
                    'gambar' => $gambarName,
                ]);
            }
        }

        // Mengarahkan kembali ke halaman produk dengan pesan sukses
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Menampilkan informasi detail produk tertentu (tidak digunakan dalam controller ini).
     */
    public function show(string $id)
    {
        // Tidak ada implementasi di sini
    }

    /**
     * Menampilkan form untuk mengedit produk tertentu (tidak digunakan dalam controller ini).
     */
    public function edit(string $id)
    {
        // Tidak ada implementasi di sini
    }

    /**
     * Memperbarui produk yang ada di penyimpanan.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            // 'tipe' => 'required|string|in:Paket,Desain',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'gambar3' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Mencari produk yang akan diperbarui
        $produk = Produk::findOrFail($id);

        // Memperbarui data produk
        $produk->update([
            'id_admin' => Auth::guard('admin')->user()->id,
            'nama_produk' => $request->nama_produk,
            // 'tipe' => $request->tipe,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // Proses upload gambar jika ada perubahan
        $gambarFiles = ['gambar1', 'gambar2', 'gambar3'];
        foreach ($gambarFiles as $key => $gambar) {
            if ($request->hasFile($gambar)) {
                // Proses upload gambar
                $gambarName = uniqid() . '.' . $request->file($gambar)->getClientOriginalExtension();
                $gambarPath = $request->file($gambar)->storeAs('produk', $gambarName, 'public');

                // Menghapus gambar lama jika ada
                $existingGambar = $produk->gambarProduk()->skip($key)->first();
                if ($existingGambar) {
                    // Hapus gambar lama dari storage dan database
                    Storage::disk('public')->delete('produk/' . $existingGambar->gambar);
                    $existingGambar->delete();
                }

                // Menyimpan gambar baru ke tabel GambarProduk
                GambarProduk::updateOrCreate(
                    ['id_produk' => $produk->id, 'gambar' => $gambarName],
                    ['id_produk' => $produk->id, 'gambar' => $gambarName]
                );
            }
        }

        // Mengarahkan kembali ke halaman produk dengan pesan sukses
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Menghapus produk dari penyimpanan.
     */
    public function destroy($id)
    {
        // Mencari produk berdasarkan ID
        $produk = Produk::find($id);

        if ($produk) {
            // Menghapus gambar terkait dengan produk dari storage
            foreach ($produk->gambarProduk as $gambar) {
                // Menghapus file gambar dari storage
                Storage::disk('public')->delete('produk/' . $gambar->gambar);
                // Menghapus record gambar dari tabel GambarProduk
                $gambar->delete();
            }

            // Menghapus produk dari database
            $produk->delete();

            // Mengarahkan kembali dengan pesan sukses
            return redirect()->route('admin.produk')->with('success', 'Produk dan gambar berhasil dihapus.');
        }

        // Jika produk tidak ditemukan, mengarahkan kembali dengan pesan error
        return redirect()->route('admin.produk')->with('error', 'Produk tidak ditemukan.');
    }
}