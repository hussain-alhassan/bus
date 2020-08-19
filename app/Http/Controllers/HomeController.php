<?php

namespace App\Http\Controllers;

use App\City;

class HomeController extends Controller
{
    public function index()
    {
        $cities = (new City())->getCities();

        return view('home', compact('cities'));
    }

    public function about()
    {
        return view('about');
    }
}
