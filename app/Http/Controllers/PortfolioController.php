<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show($id)
    {
        // Dummy data untuk portfolio
        $portfolio = (object) [
            'id' => $id,
            'owner_name' => 'Pak John Doe',
            'style' => 'Modern',
            'area' => 120,
            'completion_date' => now(),
            'images' => [
                (object) ['url' => 'https://picsum.photos/300/200?random=1'],
                (object) ['url' => 'https://picsum.photos/300/200?random=2'],
                (object) ['url' => 'https://picsum.photos/300/200?random=3'],
                (object) ['url' => 'https://picsum.photos/300/200?random=4']
            ]
        ];
        return view('portofolio.detail', compact('portfolio'));
    }
}
