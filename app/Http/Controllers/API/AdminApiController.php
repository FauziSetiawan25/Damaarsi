<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminApiController extends Controller
{
    /**
     * (LIMIT) Menampilkan daftar admin.
     */
    public function getAllAdmin()
    {
        $admins = Admin::whereIn('role', ['admin', 'nonaktif'])->get();
        return response()->json(['data' => $admins], 200);
    }

    /**
     * (LIMIT) Mengubah role admin aktif atau nonaktif.
     */
    public function ubahRole($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->role = $admin->role === 'admin' ? 'nonaktif' : 'admin';
        $admin->save();

        return response()->json([
            'message' => 'Role admin berhasil diubah',
            'admin' => $admin
        ], 200);
    }

     /**
     * (LIMIT) Menyimpan admin baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin',
            'telp' => 'required|numeric',
            'email' => 'required|email|unique:admin',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $admin = Admin::create([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->telp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);
    
        return response()->json(['message' => 'Admin berhasil ditambahkan', 'data' => $admin], 200);
    }

    /**
     * (LIMIT) Memperbarui data admin.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin,username,'.$id,
            'telp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:admin,email,'.$id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->telp,
            'email' => $request->email
        ]);

        return response()->json(['message' => 'Admin berhasil diperbarui', 'data' => $admin], 200);
    }

    /**
     * (LIMIT) Menampilkan detail admin berdasarkan id
     */
    public function show($id)
    {
        $admins = Admin::whereIn('role', ['admin', 'nonaktif'])->find($id);
        if ($admins) {
            return response()->json(['data' => $admins], 200);
        } else {
            return response()->json(['error' => 'Admin tidak ditemukan'], 404);
        }
    }

    /**
     * (LIMIT) Menghapus admin dari database.
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'message' => 'Admin berhasil dihapus'
        ], 200);
    }
}