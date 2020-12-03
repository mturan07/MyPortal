<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    function getGrup(){
        return $this->hasOne('App\Grup', 'id', 'grup_id');
    }

    function getBirim(){
        return $this->hasOne('App\Birim', 'id', 'birim_id');
    }
}
