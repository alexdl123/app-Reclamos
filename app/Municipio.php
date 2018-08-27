<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public function distritos(){

    	return $this->hasMany('App\Distrito');
    }
}
