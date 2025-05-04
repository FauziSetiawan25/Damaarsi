<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;

class PengunjungApiController extends Controller
{
    /**
     * Menampilkan daftar pengunjung yang ada.
     */
    public function getVisitorStats()
    {
        $endDate = Carbon::today()->endOfDay();
        $startDate = Carbon::today()->subDays(29)->startOfDay();

        $visitorData = Visitor::selectRaw('DATE(visited_at) as date, COUNT(*) as count')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date');

        $dates = [];
        $counts = [];

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dateStr = $date->toDateString();
            $dates[] = $dateStr;
            $counts[] = $visitorData->has($dateStr) ? $visitorData[$dateStr]->count : 0;
        }

        return response()->json([
            'dates' => $dates,
            'counts' => $counts,
        ]);
    }

    /**
     * Menampilkan jumlah pengunjung.
     */
    public function getVisitorCount()
    {
        // Menghitung jumlah pengunjung di database
        $count = Visitor::count();
        return response()->json([
            'total_pengunjung' => $count
        ]);
    }
}