<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // city name column will be either 'name' or 'name_en' based on the locale
        $CityNameField = (App::getLocale() === 'ar') ? 'name' : 'name_en';

        // get the active cities.
        $cities = City::where('is_active', 1)->get(['id',$CityNameField]);

        // make sure to pass the field as 'name' regardless of the language
        if($CityNameField !== 'name') {
            $cities->map(function ($city) use ($CityNameField) {
                return $city->name = $city->$CityNameField;
            });
        }

        return view('home', compact('cities'));
    }

    /**
     * Show the about us page.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }
}
