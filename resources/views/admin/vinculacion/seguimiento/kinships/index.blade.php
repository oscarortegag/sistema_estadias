@extends('layouts.master')

@section('header')
    <h1>Catalogo de parentescos</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Parentescos </h3>
                        <a href="{{route('kinships.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Nuevo parentesco
                        </a>
                    </div>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i>
                            {{Session::get('flash_message')}}
                        </div>
                    @endif

                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Nombre</th>
                                    <th >Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($kinships as $kinship)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $kinship->name}}</td>
                                        <td>
                                            <a href="{{ route('kinships.edit', ['id'=>$kinship->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos del parentesco"></i></a>
                                            <a class="btn btn-danger btn-sm btnEliminar" data-toggle="tooltip" title="Eliminar datos de parentesco" data-id="{{ $kinship->id }}" href="javascript:void(0)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td >
                                            <p> No existen parentescos </p>
                                        </td>
                                        <td></td>
                                        <td></td>
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
            $('#tabla-parentescos').DataTable(
                {
                    "language": lenguaje,
                    "aProcessing": true,//Activamos el procesamiento del datatables
                    "aServerSide": true,//Paginación y filtrado realizados por el servidor
                    dom: 'Bfrtip',//Definimos los elementos del control de tabla
                    "bDestroy": true,
                    "iDisplayLength": 50,//Paginación
                }
            );

            $('.btnEliminar').click(function(e){

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
                                    url: "/kinships/"+id,
                                    data: {
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    type: 'DELETE',
                                })
                                    //Si todo ha ido bien...
                                    .done(function(response){
                                        console.log(response);
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


