<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distrito;
use App\Municipio;
use DB;

class distritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distritos = Distrito::where('estado','1')->get();
        $municipios = Municipio::where('estado','1')->get();
        return view('distrito.index',compact('distritos','municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = Municipio::where('estado','1')->get();

        return view('distrito.create',compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distrito = new Distrito();
        $distrito->nombre = $request->nombre;
        $distrito->municipio_id = $request->municipio_id;
        $distrito->poblacion = $request->poblacion;
        $distrito->extension = $request->extension;
        $distrito->unidades_vec = $request->unidades_vec;
        $distrito->barrios = $request->barrios;
        $distrito->aniversario = $request->aniversario;
        $distrito->norte = $request->norte;
        $distrito->sur = $request->sur;
        $distrito->este = $request->este;
        $distrito->oeste = $request->oeste;
        $distrito->estado = '1';

        $distrito->save();

        return redirect()->route('distrito.index');
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
        $distrito = Distrito::findOrFail($id);
        $municipios = Municipio::where('estado','1')->get();

        return view('distrito.edit',compact('distrito','municipios'));
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
        $distrito = Distrito::findOrFail($id);

        $distrito->nombre = $request->nombre;
        $distrito->municipio_id = $request->municipio_id;
        $distrito->poblacion = $request->poblacion;
        $distrito->extension = $request->extension;
        $distrito->unidades_vec = $request->unidades_vec;
        $distrito->barrios = $request->barrios;
        $distrito->aniversario = $request->aniversario;
        $distrito->norte = $request->norte;
        $distrito->sur = $request->sur;
        $distrito->este = $request->este;
        $distrito->oeste = $request->oeste;

        $distrito->update();

        return redirect()->route('distrito.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distrito = Distrito::findOrFail($id);
        $distrito->estado = '0';
        $distrito->update();
        //DB::table('distritos')->where('id',$id)->update(['estado'=>'0']);

        return redirect()->route('distrito.index');
    }
}
