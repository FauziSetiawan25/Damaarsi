<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() !== '/') {
            return $next($request);
        }

        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $today = Carbon::today();


        // Cek apakah IP sudah ada dalam database untuk hari ini
        $existingVisitor = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->first();

        // Jika belum ada, simpan data pengunjung baru
        if (!$existingVisitor) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'visited_at' => now()
            ]);
        }

        return $next($request);
    }
}