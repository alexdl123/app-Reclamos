<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use DB;

class municipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::where('estado','1')->get();
        return view('municipio.index',compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('municipio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = new Municipio();

        $municipio->nombre = $request->nombre;
        $municipio->extension = $request->extension;
        $municipio->habitantes = $request->habitantes;
        $municipio->norte = $request->norte;
        $municipio->sur = $request->sur;
        $municipio->este = $request->este;
        $municipio->oeste = $request->oeste;
        $municipio->estado = '1';

        $municipio->save();

        return redirect()->route('municipio.index');
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
        $municipio = Municipio::findOrFail($id);

        return view('municipio.edit',compact('municipio'));
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
        $municipio = Municipio::findOrFail($id);

        $municipio->nombre = $request->nombre;
        $municipio->extension = $request->extension;
        $municipio->habitantes = $request->habitantes;
        $municipio->norte = $request->norte;
        $municipio->sur = $request->sur;
        $municipio->este = $request->este;
        $municipio->oeste = $request->oeste;

        $municipio->update();

        return redirect()->route('municipio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        */
        $municipio = Municipio::findOrFail($id);
        $municipio->estado = '0';
        $municipio->update();
        //DB::table('municipios')->where('id',$id)->update(['estado'=>'0']);

        return redirect()->route('municipio.index');
    }

}
