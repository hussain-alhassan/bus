<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class TravelerController extends Controller
{
    /**
     * TravelerController constructor.
     */
    public function __construct()
    {
        $lang = session('lang', 'en');
        App::setlocale($lang);
    }

    /**
     * Display the specified resource.
     * @param  int  $travelerID
     * @return \Illuminate\View\View
     */
    public function showTrips($travelerID)
    {
        return view('trips', compact('traveler'));
    }
}
