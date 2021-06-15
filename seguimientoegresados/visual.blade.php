@extends('layouts.master')

@section('header')
    <h1>Listado de  ({{ $period->name."".$period->year }})</h1>
@stop

@section('content')

    <div class="container">

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Egresados </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--<div class="form-group">
                                <a href="#" class="btn btn-success">Agregar alumno</a>
                            </div>-->
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                <ul>
                                    {{Session::get('flash_message')}}
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" id="periodId" name="periodId" value={{$period->id}}>
                        <table id="tabla-alumnos" class="table table-responsive table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>Carrera</th>
                                    <th>Correo</th>
                                    <th>Numero Telefono</th>
                                    <th>año de egreso</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($egresado as $egresados)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $egresados->apellido_paterno}}</td>
                                        <td>{{ $egresados->apellido_materno}}</td>
                                        <td>{{ $egresados->nombre}}</td>
                                        <td>{{ $egresados->period_id}}</td>
                                        <td>{{ $egresados->carrera}}</td>
                                        <td>{{ $egresados->correo_electronico}}</td>
                                        <td>{{ $egresados->numero_telefono}}</td>
                                        <td>{{ $egresados->año_egreso}}</td>    
                                        <td>
                                            <a href="{{ route('Egresados.edit', ['id'=>$egresados->egresados_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos de egresado"></i></a>
                                        <form style="display: inline" method="post" action="{{ route('Egresados.destroy', ['id'=>Crypt::encrypt($egresados->egresados_id)]) }}">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <input id="period" name="period" type="hidden" value="{{ $egresados->period_id}}">
                                            <button type = "submit" name="eliminar" id="eliminar2" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar alumno"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <p> No existen alumnos en el periodo </p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset("adminlte/datatables.net-bs/css/dataTables.bootstrap.css") }}">
@endpush

@push('scripts')
    <script src="{{ asset("adminlte/datatables.net/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net-bs/js/dataTables.bootstrap.js") }}"></script>
    <script src="{{ asset("js/admin/vinculacion/seguimiento/students/index.js"></script>
    <script>
        lenguaje = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        };

        $('#tabla-alumnos').DataTable(
            {
                "language": lenguaje,
                "aProcessing": true,//Activamos el procesamiento del datatables
                "aServerSide": true,//Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip',//Definimos los elementos del control de tabla
                "bDestroy": true,
                "iDisplayLength": 5,//Paginación
                "order": [[0, "desc"]]//Ordenar (columna,orden)
            }
        );
    </script>
@endpush
@push('jscustom')
<script type="text/javascript">
    $(document).ready(function () {
        $("#eliminar2").click(function() {
            if(confirm("¿ Desea eliminar este registro ?")){
               return true;
            }else{
                  return false;
            }
        });
    });
</script>
@endpush