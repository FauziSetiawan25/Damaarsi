<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('admin')->user();

        // Memeriksa apakah user terautentikasi sebagai admin
        if (!$user) {
            return redirect()->back()->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
        }

        // Memeriksa apakah role user adalah 'nonaktif'
        if ($user->role === 'nonaktif') {
            return redirect()->back()->with('error', 'Akun Anda nonaktif. Anda tidak memiliki izin akses.');
        }

        return $next($request);
    }
}