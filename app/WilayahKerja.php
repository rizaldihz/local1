<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WilayahKerja extends Model
{
    public function productions()
    {
        return $this->hasMany('App\Production');
    }
}
