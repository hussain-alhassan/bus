<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = ['name', 'name_en', 'logo', 'description', 'hotline'];

    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getImageContent()
    {
        return asset("storage/agencies/$this->logo");
    }

    public function deletePreviousLogo()
    {
        unlink("storage/agencies/$this->logo");
    }
}
