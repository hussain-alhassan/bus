<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
