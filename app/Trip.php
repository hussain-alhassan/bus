<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guarded = [];
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

    public function getDepart()
    {
        return (clone new Carbon($this->depart))->format(config('app.display_timestamps_format'));
    }

    public function getDateTimeLocal()
    {
        $depart = strtotime($this->depart);
        return date('Y-m-d\TH:i', $depart);
    }
}
