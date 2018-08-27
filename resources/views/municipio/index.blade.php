@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Municipios</h2>
            </div>
                <div class="pull-right">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="form-group">
                        <a class="btn btn-success" href="{{ route('municipio.create') }}"><i class="fa fa-fw fa-plus-circle"></i> Registrar nuevo Municipio</a>
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
                <th>Habitantes</th>
                <th>Al Norte con</th>
                <th>Al Sur con</th>
                <th>Al Este con</th>
                <th>Al Oeste con</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            {{ $nro=1 }}
            @foreach($municipios as $key => $row )

            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->extension }} Hectareas</td>
                <td>{{ $row->habitantes }}</td>
                <td>{{ $row->norte }}</td>
                <td>{{ $row->sur }}</td>
                <td>{{ $row->este }}</td>
                <td>{{ $row->oeste }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('municipio.edit',$row->id) }}">Modificar</a>
                    <form style="display:inline" method="post" action="{{ route('municipio.destroy',$row->id) }}">
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
