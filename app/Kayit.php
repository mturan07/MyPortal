<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kayit extends Model
{
    function getUrun(){
        return $this->hasOne('App\Urun', 'id', 'urun_id');
    }

    function getBirim(){
        return $this->hasOne('App\Birim', 'id', 'birim_id');
    }
}
