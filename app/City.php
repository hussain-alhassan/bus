<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class City extends Model
{
    protected $guarded = [];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function getCities()
    {
        // city name column will be either 'name' or 'name_<locale>'
        $CityNameField = (App::getLocale() === 'ar') ? 'name' : 'name_' . App::getLocale();

        // get the active cities.
        $cities = City::where('is_active', 1)->get(['id', $CityNameField]);

        // make sure to pass the field as 'name' regardless of the language selected
        if($CityNameField !== 'name') {
            $cities->map(function ($city) use ($CityNameField) {
                return $city->name = $city->$CityNameField;
            });
        }

        return $cities;
    }
}
