<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function catalog()
    {
        return view('home.catalog');
    }

    public function portofolio()
    {
        return view('home.portofolio');
    }

    public function about()
    {
        return view('home.about');
    }
    
    public function contact()
    {
        return view('home.contact');
    }
}
