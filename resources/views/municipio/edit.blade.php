@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualiar Municipio</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('municipio.index') }}"> Back</a>
            </div>
        </div>
    </div>

  
    <form action="{{ route('municipio.update',$municipio->id)}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}
          {{ method_field('PUT') }}

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" value="{{ $municipio->nombre }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Extension (Hectareas):</strong>
                  <input type="text" name="extension" class="form-control" value="{{ $municipio->extension }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Numero de Habitantes:</strong>
                  <input type="text" name="habitantes" class="form-control" value="{{ $municipio->habitantes }}">
            </div>
        </div>
      
        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Norte con:</strong>
                  <input type="text" name="norte" class="form-control" value="{{ $municipio->norte }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Sur con:</strong>
                  <input type="text" name="sur" class="form-control" value="{{ $municipio->sur }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Este con:</strong>
                  <input type="text" name="este" class="form-control" value="{{ $municipio->este }}">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Oeste con:</strong>
                  <input type="text" name="oeste" class="form-control" value="{{ $municipio->oeste }}">
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

