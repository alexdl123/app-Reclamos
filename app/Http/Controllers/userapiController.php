<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Persona;
use App\User;

class userapiController extends Controller
{
    
    public function registrar(Request $request){

    	try {
    		
	    	$nombre = $request->input('nombre');
	    	$apellido = $request->input('apellido');
	    	$ci = $request->input('ci');
	    	$email = $request->input('email');
	    	$fecha_nac = $request->input('fecha_nac');
	    	$direccion = $request->input('direccion');
	    	$estado = "1";

	    	$persona = new Persona();
	    	$persona->nombre = $nombre;
	    	$persona->apellido = $apellido;
	    	$persona->ci = $ci;
	    	$persona->email = $email;
	    	$persona->fecha_nac = $fecha_nac;
	    	$persona->direccion = $direccion;
	    	$persona->estado = $estado;
			$persona->save();

			$personas = Persona::All();
	        $persona1 = $personas->last();

			//Creando la cuenta para el ciudadano

			$user = new User();

	        $user->name = $nombre;
	        $user->email = $email;
	        $user->password = Hash::make($ci);
	        $user->persona_id = $persona1->id;
	        $user->save();

        	return response()->json(['resp'=>'SI','user'=>$user]);

    	} catch (Exception $e) {

    		return response()->json(['resp'=>'NO','Error'=>$e]);
    		
    	}


    }
}
