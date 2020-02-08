<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
