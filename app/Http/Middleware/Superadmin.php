<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Superadmin
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
        // Memeriksa apakah user adalah admin dan memiliki role superadmin
        $user = Auth::guard('admin')->user();

        if (!$user || $user->role !== 'superadmin') {
            return redirect()->back()->with('error', 'Akses ditolak. Hanya Superadmin yang dapat mengakses.');
        }

        return $next($request);
    }
}