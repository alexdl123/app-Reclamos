<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Persona;
use App\User;
use DB;

class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = App\User::where('active', 1)->get();
        $personas = Persona::where(['estado'=>'1','tipo'=>'W'])->paginate(10);
        return view('personas.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();

        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->email = $request->input('email');
        $persona->ci = $request->input('ci');
        $persona->fecha_nac = $request->input('fecha_nac');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = "W";
        $persona->estado = '1';

        $persona->save();
        //Creando la cuenta de usuario para la persona (operador)
        //obteniendo el id la ultima persona registrada
        $persona = Persona::All();
        $persona1 = $persona->last();

        $user = new User();

        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->ci);
        $user->persona_id = $persona1->id;
        $user->save();

        return redirect()->route('persona.index');
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
        $persona = Persona::findOrFail($id);
        return view('personas.edit',compact('persona'));
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
        $persona = Persona::findOrFail($id);

        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->direccion = $request->input('direccion');
        $persona->fecha_nac = $request->input('fecha_nac');

        $persona->update();

        return redirect()->route('persona.index');
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
        $persona = Persona::findOrFail($id);
        $persona->delete();
        */
        $persona = Persona::findOrFail($id);
        $persona->estado = '0';
        $persona->update();
        //DB::table('personas')->where('id',$id)->update(['estado'=>'0']);

        return redirect()->route('persona.index');
    }
}
