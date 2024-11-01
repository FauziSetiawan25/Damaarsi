<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = [
            [
                'title' => 'Modern House',
                'description' => 'Desain rumah modern sangat bagus',
                'image' => 'https://picsum.photos/600/400?random=1',
            ],
            [
                'title' => 'Classic House',
                'description' => 'Desain rumah klasik yang elegan',
                'image' => 'https://picsum.photos/600/400?random=2',
            ],
            [
                'title' => 'Luxury House',
                'description' => 'Desain rumah mewah dan modern',
                'image' => 'https://picsum.photos/600/400?random=3',
            ]
        ];
    
        // Dummy data for recommendations (replace with DB query)
        $recommendations = [
            [
                'title' => 'Desain 1',
                'image' => 'https://picsum.photos/300/200?random=4',
            ],
            [
                'title' => 'Desain 2',
                'image' => 'https://picsum.photos/300/200?random=5',
            ],
            [
                'title' => 'Desain 3',
                'image' => 'https://picsum.photos/300/200?random=6',
            ]
        ];
    
        return view('home.index', compact('carouselItems', 'recommendations'));
    }

    public function catalog()
    {
        return view('home.catalog');
    }

    public function portofolio()
    {
        return view('home.portofolio');
    }
    
    public function contact()
    {
        return view('home.contact');
    }
}
