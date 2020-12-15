<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $guarded = [];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
