<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamo;
use App\Imagen;

class reclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reclamos.mapa_reclamos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //SERVICIOS PARA LA APP MOVIL

    public function guardar(Request $request){

        
        try {
            
            $titulo = $request->input('Titulo');
            $descripcion = $request->input('Descripcion');
            $zona = $request->input('Zona');
            $barrio = $request->input('Barrio');
            $calle=$request->input('Calle');
            $latitud = $request->input('Latitud');
            $longitud = $request->input('Longitud');
            $estado = $request->input('Estado');
            $categoria_id = $request->input('Categoria');
            //$user_id = $request->input('user_id');
            $user_id = 1;
            //$uv_id = $request->input('uv_id');
            $uv_id = 1;
            $ruta = $request->input('ruta');
            
            $reclamo = new Reclamo();
            $reclamo->titulo = $titulo;
            $reclamo->descripcion = $descripcion;
            $reclamo->zona = $zona;
            $reclamo->barrio = $barrio;
            $reclamo->latitud = $latitud;
            $reclamo->longitud = $longitud;
            $reclamo->estado = $estado;
            $reclamo->categoria_id = $categoria_id;
            $reclamo->user_id = $user_id;
            $reclamo->uv_id = $uv_id;
            $reclamo->save();

            $reclamos = Reclamo::All();
            $reclamo1 = $reclamos->last();

            $id = $reclamo1->id;
            $imagen = new Imagen();
            $imagen->ruta = $ruta;
            $imagen->reclamo_id = $reclamo1->id;
            $imagen->save();

            return response()->json(['resp'=>'SI','reclamo'=>$reclamo,'imagen'=>$imagen]);
        } catch (Exception $e) {
            return response()->json(['resp'=>'NO','Error'=>$e]);    
        }



    }
}
