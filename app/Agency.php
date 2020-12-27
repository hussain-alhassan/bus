<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Agency extends Model
{
    protected $fillable = ['name', 'name_en', 'logo', 'description', 'hotline'];

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

    public function getName()
    {
        // Agency name column will be either 'name' or 'name_<locale>'
        $agencyNameField = (App::getLocale() === 'ar') ? 'name' : 'name_' . App::getLocale();

        return $this->$agencyNameField;
    }
}
