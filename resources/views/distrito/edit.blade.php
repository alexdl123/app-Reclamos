@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar Distrito</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('distrito.index') }}"> Back</a>

            </div>
        </div>
    </div>

  
    <form action="{{ route('distrito.update',$distrito->id)}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  
        {{  csrf_field() }}
        {{ method_field('PUT') }}

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Municipio:</strong>
               <select name="municipio_id" id="" class="form-control selectpicker" data-live-search="true">
                    @foreach ($municipios as $key => $row)
                        <option value="{{ $row->id }}" >{{ $row->nombre }}</option>    
                    @endforeach 
               </select>
            </div>
        </div>


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" value="{{ $distrito->nombre }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Extension (Hectareas):</strong>
                  <input type="text" name="extension" class="form-control" value="{{ $distrito->extension }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Poblacion:</strong>
                  <input type="text" name="poblacion" class="form-control" value="{{ $distrito->poblacion }}">
            </div>
        </div>
      

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Unidades Vecinales:</strong>
                  <input type="text" name="unidades_vec" class="form-control" value="{{ $distrito->unidades_vec }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Cantidad de Barrios:</strong>
                  <input type="text" name="barrios" class="form-control" value="{{ $distrito->barrios }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Aniversario:</strong>
                  <input type="text" name="aniversario" class="form-control" value="{{ $distrito->aniversario }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Norte con:</strong>
                  <input type="text" name="norte" class="form-control" value="{{ $distrito->norte }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Sur con:</strong>
                  <input type="text" name="sur" class="form-control" value="{{ $distrito->sur }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Este con:</strong>
                  <input type="text" name="este" class="form-control" value="{{ $distrito->este }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Oeste con:</strong>
                  <input type="text" name="oeste" class="form-control" value="{{ $distrito->oeste }}">
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

