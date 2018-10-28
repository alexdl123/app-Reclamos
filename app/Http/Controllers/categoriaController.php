<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Categoria;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categorias = Categoria::All();

        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
        $imagen = $request->file('imagen');
        $descripcion = $request->input('descripcion');

        $ruta = "-";
        if($imagen){
            $ruta = $imagen->store('public');    
            $ruta = str_replace('public','storage',$ruta);
        }
        $categoria = new Categoria();
        $categoria->nombre = $nombre;
        $categoria->imagen = $ruta;
        $categoria->descripcion = $descripcion;
        $categoria->save();

        return redirect()->route('categoria.index');
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
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit',compact('categoria'));
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
        $nombre = $request->input('nombre');
        $imagen = $request->file('imagen');
        $descripcion = $request->input('descripcion');

        $ruta = "-";
        if($imagen){
            $ruta = $imagen->store('public');    
            $ruta = str_replace('public','storage',$ruta);
        }

        $categoria = Categoria::findOrFail($id);

        if($ruta!=="-"){
            $img = str_replace("storage/", "public/", $categoria->imagen);
            $img = "storage/".$img;
            Storage::delete(asset('/storage/9yBlOG6KxNwaRoIrAKNpbBRr16q5PQyohbflIDcp.png'));
        }else{
            $ruta = $categoria->imagen;
        }

        $categoria->nombre = $nombre;
        $categoria->descripcion = $descripcion;
        $categoria->imagen = $ruta;
        $categoria->update();

        return redirect()->route('categoria.index');
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

    //SERVICIOS PARA APP MOBIL

    public function getCategorias(){
        try {

            $categorias = Categoria::All();
            return response()->json(['resp'=>'SI','categorias'=>$categorias]);   

        } catch (Exception $e) {

            return response()->json(['resp'=>'NO']);   
            
        }
    }
}
