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
}
