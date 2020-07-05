<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    public $timestamps = false;

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }
    public function conducteur()
    {
        return $this->hasOne('App\Conducteur');
    }
    public function plannings()
    {
        return $this->hasMany('App\Planning');
    }
}
