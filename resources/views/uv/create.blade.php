@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Nuevo UV</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uv.index') }}"> Back</a>

            </div>
        </div>
    </div>

  
    <form action="{{ route('uv.store')}}" method="POST" enctype="multipart/form-data" files='true'> 
    <div class="row">
		  {{  csrf_field() }}


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              <strong>Municipio:</strong>
               <select name="distrito_id" id="" class="form-control selectpicker" data-live-search="true">
                  <?php foreach ($distritos as $key => $row): ?>
                      <option value="{{ $row->id }}" >{{ $row->nombre }}</option>
                  <?php endforeach ?>
               </select>
            </div>
        </div>


        <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de la UV">
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
                <strong>Descripcion:</strong>
                  <input type="text" name="descripcion" class="form-control" placeholder="Descripcion de la UV">
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

