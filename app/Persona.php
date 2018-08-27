<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
	protected $table = 'personas';

    protected $fillable = [
       'id','nombre', 'apellido', 'email','fecha_nac','ci','direccion','tipo'
    ];

  	public function user(){

  		return $this->hasOne('App\User');
  	}
}
