@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo Operador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('persona.index') }}"> Back</a>

            </div>
        </div>
    </div>

  
    <form action="{{ route('persona.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido:</strong>
                  <input type="text" name="apellido" class="form-control" placeholder="Apellido">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Carnet de Identidad:</strong>
                  <input type="text" name="ci" class="form-control" placeholder="Carnet de Indentidad">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Email:</strong>
                  <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Direccion:</strong>
                  <input type="text" name="direccion" class="form-control" placeholder="Direccion">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group" id="fechaCreate">
              <strong>Fecha de Nacimiento:</strong>
                <input type="date" name="fecha_nac" class="form-control">
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

