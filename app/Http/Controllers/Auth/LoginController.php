<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Konstruktor untuk middleware guest.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'login']);
    }

    /**
     * Menampilkan form login.
     * 
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.index');
    }

    /**
     * Memproses autentikasi admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi
        if (Auth::guard('admin')->attempt($credentials, $request->has('ingatkan'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'You have successfully logged in!');
        }

        // Gagal login
        return back()->withErrors([
            'username' => 'Your provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    /**
     * Logout admin dari aplikasi.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have logged out successfully!');
    }
}