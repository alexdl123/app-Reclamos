<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Persona;
use App\User;

class userapiController extends Controller
{
    //
    public function registrar(Request $request){
    	try {
	    	$nombre = $request->input('nombre');
	    	$apellido = $request->input('apellido');
	    	$email = $request->input('email');
	    	$estado = "1"; // estado activo

	    	$persona = new Persona();
	    	$persona->nombre = $nombre;
	    	$persona->apellido = $apellido;
	    	$persona->email = $email;
	    	$persona->estado = $estado;
	    	$persona->tipo = "M";
			$persona->save();

        	return response()->json(['resp'=>'SI','user'=>$persona]);

    	} catch (Exception $e) {

    		return response()->json(['resp'=>'NO','Error'=>$e]);
    		
    	}

    }
}
