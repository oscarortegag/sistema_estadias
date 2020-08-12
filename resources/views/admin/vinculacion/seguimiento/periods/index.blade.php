@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado de periodos</h3>
                        <a href="{{route('periods.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Nueva periodo
                        </a>
                    </div><br><br>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-info">
                            <ul>
                                {{Session::get('flash_message')}}
                            </ul>
                        </div>
                    @endif                     
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-period" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Cuatrimestre</th>
                                    <th >Año</th>
                                    <th >Fecha inicio</th>
                                    <th >Fecha fin</th>
                                    <th>Acciones</th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($period as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->name}}</td>
                                        <td>{{ $items->year}}</td>
                                        <td>{{ $items->firstDay}}</td>
                                        <td>{{ $items->lastDay}}</td>                            
                                        <td>
                                            @if(is_null($items->deleted_at))
                                                <a href="{{ route('periods.edit',['id'=>$items->period_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar periodo"></i></a>
                                                <form style="display: inline" method="POST" action="{{ route('periods.destroy',['id'=>$items->period_id]) }}">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <button type = "submit" name="eliminar" id="eliminar2" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Ocultar periodo"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            @else
                                                <form style="display: inline" method="POST" action="{{ route('periods.restore',['id'=>$items->period_id]) }}">
                                                    {!! csrf_field() !!}
                                                    <button type = "submit" name="eliminar" id="eliminar3" class="btn btn-default btn-sm" data-toggle="tooltip" title="Mostrar periodo"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <p> No existen periodos</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset("adminlte/datatables.net-bs/css/dataTables.bootstrap.css") }}">
@endpush

@push('scripts')
    <script src="{{ asset("adminlte/datatables.net/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net-bs/js/dataTables.bootstrap.js") }}"></script>
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

        $('#tabla-period').DataTable(
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
            if(confirm("¿ Desea ocultar este registro ?")){
               return true;
            }else{
                  return false;
            }
        });
    });
    $(document).ready(function () {
        $("#eliminar3").click(function() {
            if(confirm("¿ Desea visualizar este registro ?")){
               return true;
            }else{
                  return false;
            }
        });
    });    
</script>
@endpush


