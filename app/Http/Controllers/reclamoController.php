<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamo;
use App\Imagen;
use App\Distrito;
use App\Municipio;
use App\Categoria;
use App\Uv;

class reclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //para el uso de AJAX
    public function getReclamos(){

        $reclamos = Reclamo::All();
        return $reclamos;
    }

    //Muestra el Mapa
    public function index()
    {
        return view('reclamos.mapa_reclamos');
    }

    //Para los cuadros estadisticos
    public function index2(){

        return view('reclamos.estadistico_reclamos');
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
        
    }

    //SERVICIOS PARA LA APP MOVIL

    public function obtenerReclamos($id){
        try {

            $reclamos = Reclamo::where(['estado'=>'1','user_id'=>$id])->get();
            //$uvs = Uv::All();
            $reclamos2 = array();
            $index = 0;
            foreach ($reclamos as $key => $row) {

                $uv = Uv::findOrFail($row->uv_id);
                $distrito = Distrito::findOrFail($uv->distrito_id);
                $municipio = Municipio::findOrFail($distrito->municipio_id);
                $categoria = Categoria::findOrFail($row->categoria_id);
                $auxiliar = array('titulo' => $row->titulo,
                                  'descripcion' => $row->descripcion,
                                  'zona' => $row->zona,
                                  'barrio' => $row->barrio,
                                  'calle' => $row->calle,
                                  'latitud' => $row->latitud,
                                  'longitud' => $row->longitud,
                                  'estado' => $row->estado,
                                  'categoria' => $categoria->nombre,
                                  'uv' => $uv->nombre,
                                  'distrito' => $distrito->nombre,
                                  'municipio' => $municipio->nombre                                    
                 );
                $reclamos2[$index] = $auxiliar;
                $index++;
            }

            return response()->json(['resp'=>'SI','reclamos'=>$reclamos2]);

        } catch (Exception $e) {

            return response()->json(['resp'=>'NO','Error'=>$e]);

        }

        
    }

    public function guardar(Request $request){

        
        try {
            
            $titulo = $request->input('titulo');
            $descripcion = $request->input('descripcion');
            $calle=$request->input('calle');
            $zona = $request->input('zona');
            $barrio = $request->input('barrio');
            $latitud = $request->input('latitud');
            $longitud = $request->input('longitud');
            $estado = $request->input('estado');
            $categoria_id=$request->input('id_categoria');
            $user_id = 1;
            //$uv_id = $request->input('uv_id');
            $uv_id = 1;
            
            $reclamo = new Reclamo();
            $reclamo->titulo = $titulo;
            $reclamo->descripcion = $descripcion;
            $reclamo->zona = $zona;
            $reclamo->barrio = $barrio;
            $reclamo->calle=$calle;
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
            $imagen->ruta = $request->input('imagen');
            $imagen->reclamo_id = $reclamo1->id;
            $imagen->save();

            return response()->json(['resp'=>'SI','reclamo'=>$reclamo,'imagen'=>$imagen]);
        } catch (Exception $e) {
            return response()->json(['resp'=>'NO','Error'=>$e]);    
        }



    }
}
