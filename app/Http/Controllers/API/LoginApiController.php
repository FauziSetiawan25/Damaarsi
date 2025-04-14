<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    /**
     * Autentikasi admin dan buat token.
     */
    public function authenticate(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // autentikasi menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();  // user yang terautentikasi
            
            // Buat token untuk admin
            $token = $admin->createToken('Laravel')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    /**
     * Logout admin dan hapus token.
     */
    public function logout(Request $request)
    {
        // Hapus token yang digunakan untuk autentikasi saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}