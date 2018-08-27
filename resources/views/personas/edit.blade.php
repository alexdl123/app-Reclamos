@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Actualizar Operador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('persona.index') }}"> Back</a>

            </div>
        </div>
    </div>
 
  
    <form action="{{ route('persona.update',$persona->id)}}" method="POST" enctype="multipart/form-data" files='true'>
    {{method_field('PUT')}} 
    <div class="row">

		{{  csrf_field() }}

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" value="{{$persona->nombre}}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido:</strong>
                  <input type="text" name="apellido" class="form-control" value="{{$persona->apellido}}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Direccion:</strong>
                  <input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group" id="fechaCreate">
              <strong>Fecha de Nacimiento:</strong>
                <input type="date" name="fecha_nac" class="form-control" value="{{$persona->fecha_nac}}">
         </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          {{  csrf_field() }}

            <div class="form-group">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    

    </div>
</form>

    
@endsection

