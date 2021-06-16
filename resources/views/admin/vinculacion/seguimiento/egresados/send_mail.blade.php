@extends('layouts.master')

@section('header')
    <h1>Envio de emails ({{ $period->name . " / " . date("Y", strtotime($period->firstDay)) }})</h1>
@stop

@section('content')
    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Enviar emails</h3>
                    </div>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i>
                            {{Session::get('flash_message')}}
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form name="formulario" method="POST" action="{{ route("egresados.post_send_mail", [$period->period_id]) }}" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <input name="period_id" type="hidden" value={{ $period->period_id }} id='period_id'>

                            {{-- Cambiamos para obtener solo egresados --}}
                            @if($period->students->where('verified', '!=', 1)->count())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p>Existen {{ $period->students->where('verified', '!=', 1)->count() }} alumnos que no han realizado la validación de sus datos</p>
                                </div>
                           @endif
                            <div class="radio">
                                <label><input type="checkbox" name="todos" id="todos"> Todos los egresados</label>
                            </div>
                            <table id="tabla-alumnos" class="table table-responsive table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Selección</th>
                                    <th>Nombre</th>
                                    <th>Especialidad</th>
                                    <th>Cuatrimestre</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($period->egresados as $student)
                                    @php $student = $student->student; @endphp
                                    <tr>
                                        <td>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="{{ $student->student_id }}" name="alumnos[]"></label>
                                                </div>
                                        </td>
                                        <td>{{ $student->name . " " . $student->lastName . " " . $student->motherLastNames }}  </td>
                                        <td>{{ $student->educativeProgram->shortName  }}  </td>
                                        <td>{{ $student->quarter->quarterName}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <p> No existen egresados en el periodo </p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="form-group">
                                <label for="subject" class="col-form-label text-md-right">Asunto</label>
                                <input id="subject" type="text" class="form-control" name="subject" required>
                            </div>

                            <div class="form-group">
                                <label for="content" class="col-form-label text-md-right">Contenido del correo electrónico</label>
                                <textarea id="content" name="content" rows="3" class="form-control" required>

                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="signature" class="col-form-label text-md-right">Archivo de firma</label>
                                <input id="signature" type="file" class="form-control" name="signature" required>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-md-6 offset-md-4 mb-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar email
                                    </button>
                                    <a href="{{route('seguimiento.index')}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div><br><br>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
@push('styles')


    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("adminlte/datatables.net-bs/css/dataTables.bootstrap.css") }}">

@endpush
@push('scripts')

    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net-bs/js/dataTables.bootstrap.js") }}"></script>
    <script src="{{ asset("adminlte/ckeditor/ckeditor.js") }}"></script>

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

        function seleccionar_todo(){
            for (i=0;i<document.formulario.elements.length;i++)
                if(document.formulario.elements[i].type == "checkbox")
                    document.formulario.elements[i].checked=1
        }

        function deseleccionar_todo(){
            for (i=0;i<document.formulario.elements.length;i++)
                if(document.formulario.elements[i].type == "checkbox")
                    document.formulario.elements[i].checked=0
        }

        $(document).ready(function() {
            $("#start_date").datepicker({
                language: 'es',
                format:'yyyy-mm-dd',
                autoclose: true
            }).on('changeDate', function (selected) {
                var startDate = new Date(selected.date.valueOf());
                $('#end_date').datepicker('setStartDate', startDate);
            }).on('clearDate', function (selected) {
                $('#end_date').datepicker('setStartDate', null);
            });

            $("#end_date").datepicker({
                language: 'es',
                format:'yyyy-mm-dd',
                autoclose: true
            }).on('changeDate', function (selected) {
                var endDate = new Date(selected.date.valueOf());
                $('#start_date').datepicker('setEndDate', endDate);
            }).on('clearDate', function (selected) {
                $('#start_date').datepicker('setEndDate', null);
            });

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

        CKEDITOR.replace('content');

        $( '#todos' ).on( 'click', function() {
            if( $(this).is(':checked') ){
                // Hacer algo si el checkbox ha sido seleccionado
                seleccionar_todo();
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                deseleccionar_todo();
            }
        });
        });

    </script>
@endpush
