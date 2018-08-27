<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    
    public function uvs(){

    	return $this->hasMany('App\Uv');
    }
}
