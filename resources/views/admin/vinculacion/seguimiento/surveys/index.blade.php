
@extends('layouts.master')

@section('header')
    <h1>Listado de encuestas ({{ $period->name . " / " . date("Y", strtotime($period->firstDay)) }})</h1>
@stop

@section('content')

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Encuestas </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <a href="{{route('surveys.create', ['id'=>$period->period_id])}}" class="btn btn-success">Agregar encuesta</a>
                                <a href="{{route('surveys.duplicate', ['id'=>$period->period_id])}}" class="btn btn-success">Copiar encuesta</a>

                            </div>
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>
                                    {{Session::get('flash_message')}}
                                </div>
                            @endif
                            <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="25%">Nombre</th>
                                <th width="30%">Tipo de encuesta</th>
                                <th width="30%">Descripción</th>
                                <th width="10%">Avance</th>
                                <th width="5%">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($period->surveys as $survey)
                                <tr>
                                    <td>{{ $survey->displayName }}</td>
                                    <td>
                                        @if($survey->tipo == 0)
                                            <span class="label label-info">Encuesta para alumnos</span>
                                        @else
                                            <span class="label label-success">Encuesta para empresas</span>
                                        @endif
                                    </td>
                                    <td>{!! $survey->description !!}</td>
                                    <td>
                                        @if($survey->applySurveys->count() == 0)
                                            <span class="label label-danger">Encuesta sin aplicar</span>
                                        @else
                                            <div class="progress-group">
                                                <span class="progress-number"><b>{{ $survey->applySurveys->where('status', 1)->count() }}</b> / {{$survey->applySurveys->count()}}</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-green" style="width: {{ ($survey->applySurveys->where('status', 1)->count() / $survey->applySurveys->count())*100 }}%"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($survey->active)
                                            <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos de la encuesta"><i class="fas fa-edit"></i></a>

                                            {{-- Validar tipo de encuesta --}}
                                            @if($survey->tipo)
                                                <a href="{{route('surveys.apply',['id'=>$survey->id])}}"
                                                   class="btn btn-primary btn-sm" data-toggle="tooltip" title="Aplicar encuesta a empresas"><i class="fas fa-copy"></i></a>
                                            @else
                                                <a href="{{route('surveys.apply',['id'=>$survey->id])}}"
                                                   class="btn btn-primary btn-sm" data-toggle="tooltip" title="Aplicar encuesta a estudiantes"><i class="fas fa-copy"></i></a>
                                            @endif

                                            @if($survey->questions->count() == 0)
                                                <form style="display: inline" method="POST" action="{{ route("surveys.destroy",[$survey->id]) }}">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}

                                                    <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar datos de encuesta"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                                <a class="btn btn-danger btn-sm btnEliminarSurvey" data-toggle="tooltip" title="Eliminar datos del estado de la república" data-id="{{ $survey->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            @if($survey->applySurveys->count() == 0)
                                                <a href="{{route('surveys.deactivate',['id'=>$survey->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Desactivar encuesta"><i class="fa fa-close"></i></a>
                                            @endif
                                        @else
                                            <a href="{{route('surveys.activate',['id'=>$survey->id])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Activar encuesta"><i class="fa fa-check"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <p> No existen encuestas en el periodo </p>
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
@stop
@push('styles')
    <link rel="stylesheet" href="{{ asset("adminlte/datatables.net-bs/css/dataTables.bootstrap.css") }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
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
        $(document).ready(function() {
            $('#tabla-encuestas').DataTable(
                {
                    "language": lenguaje,
                    "aProcessing": true,//Activamos el procesamiento del datatables
                    "aServerSide": true,//Paginación y filtrado realizados por el servidor
                    dom: 'Bfrtip',//Definimos los elementos del control de tabla
                    "bDestroy": true,
                    "iDisplayLength": 5,//Paginación
                }
            );

            $('.btnEliminarSurvey').click(function(e){

                e.preventDefault();

                var id = $(this).attr('data-id');
                var parent = $(this).parent("td").parent("tr");

                bootbox.dialog({
                    message: "¿Estás seguro de eliminar el registro?",
                    title: "<i class='fa fa-trash-o'></i> ¡Atención!",
                    buttons: {
                        cancel: {
                            label: "No",
                            className: "btn-success",
                            callback: function() {
                                $('.bootbox').modal('hide');
                            }
                        },
                        confirm: {
                            label: "Eliminar",
                            className: "btn-danger",
                            callback: function() {
                                $.ajax({
                                    url: "/survey_delete/"+id,
                                    data: {
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    type: 'DELETE',
                                })
                                    //Si todo ha ido bien...
                                    .done(function(response){
                                        bootbox.alert(response);
                                        parent.fadeOut('slow'); //Borra la fila afectada
                                    })
                                    .fail(function(){
                                        bootbox.alert('Algo ha ido mal. No se ha podido completar la acción.');
                                    })
                            }
                        }
                    }
                });
            });
        });

    </script>
@endpush


