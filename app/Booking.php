<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function from_city()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    public function to_city()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
