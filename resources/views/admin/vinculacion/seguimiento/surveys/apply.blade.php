@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $survey->period->name . " / " . date("Y", strtotime($survey->period->firstDay)) }})</h1>
@stop

@section('content')
    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Aplicar encuesta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form name="formulario" method="POST" action="{{ route("surveys.post_duplicate") }} enctype="multipart/form-data"">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <input name="survey_id" type="hidden" value={{ $survey->id }} id='survey_id'>

                            <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="start_date" class="col-form-label text-md-right">Fecha inicio</label>

                                <div class='input-group date' id='grp_start_date'>
                                    <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required readonly>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-xs-6">
                                <label for="end_date" class="col-form-label text-md-right">Fecha final</label>

                                <div class='input-group date' id='grp_end_date'>
                                    <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required readonly>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                            </div>
                            </div>

                            <div class="radio">
                                <label><input type="checkbox" name="todos" id="todos"> Todos los alumnos</label>
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
                                @forelse ($survey->period->students as $student)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </td>
                                        <td>{{ $student->name . " " . $student->lastName . " " . $student->motherLastName }}  </td>
                                        <td>{{ $student->educativeProgram->shortName  }}  </td>
                                        <td>{{ $student->quarter->quarterName}}</td>
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

                            <div class="form-group">
                                <label for="content" class="col-form-label text-md-right">Contenido del correo electrónico</label>
                                <textarea id="content" name="content" rows="3" class="form-control">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="signature" class="col-form-label text-md-right">Archivo de firma</label>
                                <input id="signature" type="file" class="form-control" name="signature" required>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Copiar
                                    </button>
                                    <a href="{{route('surveys.index', ['id'=>$survey->period->period_id])}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div>
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
    <link rel="stylesheet" href="/adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/adminlte/datatables.net-bs/css/dataTables.bootstrap.css">

@endpush
@push('scripts')
    <script src="/adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="/adminlte/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/adminlte/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="/adminlte/ckeditor/ckeditor.js"></script>

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
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
                format:'dd/mm/yyyy',
                autoclose: true
            }).on('changeDate', function (selected) {
                var startDate = new Date(selected.date.valueOf());
                $('#end_date').datepicker('setStartDate', startDate);
            }).on('clearDate', function (selected) {
                $('#end_date').datepicker('setStartDate', null);
            });

            $("#end_date").datepicker({
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: '',
                format:'dd/mm/yyyy',
                autoclose: true
            }).on('changeDate', function (selected) {
                var endDate = new Date(selected.date.valueOf());
                $('#start_date').datepicker('setEndDate', endDate);
            }).on('clearDate', function (selected) {
                $('#start_date').datepicker('setEndDate', null);
            });
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


    </script>
@endpush
