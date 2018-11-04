<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Uv;
use App\Distrito;

class uvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUvs(){

        $uvs = Uv::All();
        return $uvs;
        
    }

    public function index()
    {
        $uvs = Uv::where('estado','1')->get();
        $distritos = Distrito::where('estado','1')->get();

        return view('uv.index',compact('uvs','distritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::where('estado','1')->get();

        return view('uv.create',compact('distritos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uv = new Uv();

        $uv->nombre = $request->nombre;
        $uv->distrito_id = $request->distrito_id;
        $uv->extension = $request->extension;
        $uv->descripcion = $request->descripcion;
        $uv->estado = '1';

        $uv->save();

        return redirect()->route('uv.index');
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
        $uv = UV::findOrFail($id);

        $distritos = Distrito::where('estado','1')->get();

        return view('uv.edit',compact('uv','distritos'));
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
        $uv = Uv::findOrFail($id);

        $uv->nombre = $request->nombre;
        $uv->distrito_id = $request->distrito_id;
        $uv->extension = $request->extension;
        $uv->descripcion = $request->descripcion;

        $uv->update();

        return redirect()->route('uv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uv = Uv::findOrFail($id);
        $uv->estado = '0';
        $uv->update();
        //DB::table('uvs')->where('id',$id)->update(['estado'=>'0']);

        return redirect()->route('uv.index');
    }
}
