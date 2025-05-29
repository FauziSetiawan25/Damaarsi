<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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
}