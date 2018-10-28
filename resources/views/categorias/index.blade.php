@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Categorias de Reclamos</h2>
            </div>
                <div class="pull-right">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="form-group">
                        <a class="btn btn-success" href="{{ route('categoria.create') }}"><i class="fa fa-fw fa-plus-circle"></i> Registrar Nueva Categoria</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row">
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="table-responsive">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            <?php $nro=1 ?>
            @foreach($categorias as $key => $row )

            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->descripcion }}</td>
                <td><img width="100px" height="100px" src="{{asset($row->imagen)}}"></td>
                <td>
                    <a class="btn btn-info" href="{{ route('categoria.edit',$row->id) }}">Modificar</a>
                    <form style="display:inline" method="post" action="{{ route('categoria.destroy',$row->id) }}">
                    {{ csrf_field() }}

                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
    
                </td>
            </tr>
            <?php $nro++ ?>
            @endforeach
            
            <!--<img src=Storage::disk('local')->put('file.txt', 'Contents')>-->
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
