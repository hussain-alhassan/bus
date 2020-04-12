<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function from_city()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    public function to_city()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }
}
