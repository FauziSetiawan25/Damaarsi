<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Instantiate a new LoginController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'login']);
    }

    /**
     * Display the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.index');  // Pastikan ini adalah halaman login Anda
    }

    /**
     * Authenticate the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->has('ingatkan'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'You have successfully logged in!');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Your provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    /**
     * Log out the admin from application.
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