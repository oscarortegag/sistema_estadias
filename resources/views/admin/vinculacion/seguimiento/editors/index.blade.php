@extends('layouts.master')

@section('header')
    <h1>Asesor de estilo y redacción</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado</h3>
                        <a href="{{route('editors.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Nuevo asesor redacción
                        </a><br><br>
                    </div>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-info">
                            <ul>
                                {{Session::get('flash_message')}}
                            </ul>
                        </div>
                    @endif                     
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-editor" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Correo electrónico</th>
                                    <th>Télefono</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($editor as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->nameEditorialAdvisor}}</td>
                                        <td>{{ $items->editorialPosition}}</td>
                                        <td>{{ $items->editorialAdvisorEmail}}</td>
                                        <td>{{ $items->editorialAdvisorPhone}}</td> 
                                        <td>
                                            @if(is_null($items->deleted_at))
                                                <a href="{{ route('editors.edit', ['id'=>$items->editorialAdvisor_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos asesor"></i></a>
                                                <form style="display: inline" method="post" action="{{ route('editors.destroy', ['id'=>$items->editorialAdvisor_id]) }}">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}
                                                    <button type = "submit" name="eliminar" id="eliminar2" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Ocultar asesor de estilo"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            @else
                                                <form style="display: inline" method="post" action="{{ route('editors.restore', ['id'=>$items->editorialAdvisor_id]) }}">
                                                    {!! csrf_field() !!}
                                                    <button type = "submit" name="eliminar" id="eliminar3" class="btn btn-default btn-sm" data-toggle="tooltip" title="Mostrar asesor de estilo"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <p>No existen asesores académicos</p>
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

        $('#tabla-editor').DataTable(
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