<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman utama admin.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Menampilkan dashboard admin dengan statistik pelanggan dan produk.
     * 
     * @return Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Menyimpan admin baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin',
            'telp' => 'required|numeric',
            'email' => 'required|email|unique:admin',
            'password' => 'required|string|confirmed|min:6',
        ]);

        Admin::create([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->telp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil ditambahkan!');
    }

    /**
     * Menampilkan data admin dengan status 'admin' dan 'nonaktif'.
     */
    public function show()
    {
        $admins = Admin::whereIn('role', ['admin', 'nonaktif'])->get();
        return view('admin.dataadmin', compact('admins'));
    }

    /**
     * Mengubah status role admin antara 'admin' dan 'nonaktif'.
     */
    public function ubahrole($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->role = $admin->role === 'admin' ? 'nonaktif' : 'admin';
        $admin->save();

        return redirect()->route('admin.dataadmin')->with('success', 'Status berhasil diubah.');
    }

    /**
     * Memperbarui data admin yang ada.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->nama_admin = $request->input('nama');
        $admin->username = $request->input('username');
        $admin->no_telp = $request->input('telp');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->back()->with('success', 'Admin berhasil diperbarui');
    }

    /**
     * Menghapus admin dari database.
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        
        $admin->delete();

        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil dihapus.');
    }
}
