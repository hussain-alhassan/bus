<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
