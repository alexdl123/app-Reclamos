@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Operadores</h2>
            </div>
                <div class="pull-right">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="form-group">
                        <a class="btn btn-success" href="{{ route('persona.create') }}"><i class="fa fa-fw fa-plus-circle"></i> Registrar Operador</a>
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
                <th>Apellido</th>
                <th>CI</th>
                <th>E-mail</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>

                <th width="280px">Opciones</th>
            </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
            <?php  $nro=1 ?>
            @foreach($personas as $key => $row)

            <tr>
                <td>{{ $nro }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->apellido }}</td>
                <td>{{ $row->ci }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->fecha_nac }}</td>
                <td>{{ $row->direccion }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('persona.edit',$row->id) }}">Modificar</a>
                    <form style="display:inline" method="post" action="{{ route('persona.destroy',$row->id) }}">
                    {{ csrf_field() }}

                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
    
                </td>
            </tr>
            <?php $nro++ ?>
            @endforeach
            
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
