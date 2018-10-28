@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modificar la Categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categoria.index') }}"> Back</a>

            </div>
        </div>
    </div>

  
    <form action="{{ route('categoria.update',$categoria->id)}}" method="POST" enctype="multipart/form-data" files='true'> 
        <div class="row">
    		  {{  csrf_field() }}
              {{ method_field('PUT') }}

            <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Nombre:</strong>
                      <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}">
                </div>
            </div>

            <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Imagen:</strong>
                      <input type="file" name="imagen" class="form-control">
                </div>
            </div>
          
         </div>
         <div class="row"> 
            <div class="col-lg-4 col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                      <textarea name="descripcion" rows="3" class="form-control">{{ $categoria->descripcion }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              {{  csrf_field() }}

                <div class="form-group">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
        </div>
    </form>

    
@endsection

