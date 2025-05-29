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

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();  

            if ($admin->role === 'nonaktif') {
                Auth::guard('admin')->logout(); 
                return response()->json([
                    'message' => 'Akun Anda nonaktif. Silakan hubungi administrator.'
                ], 403);
            }

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
     * (LIMIT) Logout admin dan hapus token.
     */
    public function logout(Request $request)
    {
        // Hapus token pengguna yang aktif
        if ($request->user()) {
            $request->user()->tokens->each(function ($token) {
                $token->delete();
            });
        }

        // Hapus session untuk guard admin jika ada
        if ($request->hasSession()) {
            auth('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}