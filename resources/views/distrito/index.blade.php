@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Distritos</h2>
            </div>
                <div class="pull-right">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="form-group">
                        <a class="btn btn-success" href="{{ route('distrito.create') }}"><i class="fa fa-fw fa-plus-circle"></i> Registrar nuevo Distrito</a>
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
                <th>Extension</th>
                <th>Poblacion</th>
                <th>Unidades Vecinales</th>
                <th>Barrios</th>
                <th>Aniversario</th>
                <th>Municipio</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            {{ $nro=1 }}
            @foreach($distritos as $key => $row )

            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->extension }} Hectareas</td>
                <td>{{ $row->poblacion }}</td>
                <td>{{ $row->unidades_vec }}</td>
                <td>{{ $row->barrios }}</td>
                <td>{{ $row->aniversario }}</td>
                @foreach($municipios as $key => $row1)
                    @if($row1->id==$row->municipio_id)
                        <td>{{ $row1->nombre }}</td>
                    @endif
                @endforeach
                
                <td>
                    <a class="btn btn-info" href="{{ route('distrito.edit',$row->id) }}">Modificar</a>
                    <form style="display:inline" method="post" action="{{ route('distrito.destroy',$row->id) }}">
                    {{ csrf_field() }}

                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
    
                </td>
            </tr>
            {{ $nro++ }}
            @endforeach
            
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
