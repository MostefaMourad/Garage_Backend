<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public $timestamps = false;

    public function piece()
    {
        return $this->hasOne('App\Piece_Rechange');
    }
}
