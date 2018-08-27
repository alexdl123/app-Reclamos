@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo Distrito</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('distrito.index') }}"> Back</a>

            </div>
        </div>
    </div>

  
    <form action="{{ route('distrito.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Municipio:</strong>
               <select name="municipio_id" id="" class="form-control selectpicker" data-live-search="true">
                  <?php foreach ($municipios as $key => $row): ?>
                      <option value="{{ $row->id }}" >{{ $row->nombre }}</option>
                  <?php endforeach ?>
               </select>
            </div>
        </div>


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre del Distrito">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Extension (Hectareas):</strong>
                  <input type="text" name="extension" class="form-control" placeholder="Extension">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Poblacion:</strong>
                  <input type="text" name="poblacion" class="form-control" placeholder="Poblacion">
            </div>
        </div>
      

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Unidades Vecinales:</strong>
                  <input type="text" name="unidades_vec" class="form-control" placeholder="Unidades Vecinales">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Cantidad de Barrios:</strong>
                  <input type="text" name="barrios" class="form-control" placeholder="Cantidad de Barrios">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Aniversario:</strong>
                  <input type="text" name="aniversario" class="form-control" placeholder="Aniversario">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Norte con:</strong>
                  <input type="text" name="norte" class="form-control" placeholder="Colinda al Norte con">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Sur con:</strong>
                  <input type="text" name="sur" class="form-control" placeholder="Colinda al Sur con">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Este con:</strong>
                  <input type="text" name="este" class="form-control" placeholder="Colinda al Este con">
            </div>
        </div>

        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Colinda al Oeste con:</strong>
                  <input type="text" name="oeste" class="form-control" placeholder="Colinda al Oeste con">
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

