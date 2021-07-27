@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $survey->period->name . " / " . date("Y", strtotime($survey->period->firstDay)) }})</h1>
@stop

<style>
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>


@section('content')
    <div class="container box">
        <div class="row justify-content-center">
                <div class="col-md-12">
                        <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Editar encuesta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('surveys.update', [$survey->id]) }}">
                            {!! method_field('PUT') !!}
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if(Session::has('flash_message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>
                                    {{Session::get('flash_message')}}
                                </div>
                            @endif



                            <div class="form-group">
                                <label for="displayName" class="col-form-label text-md-right">Nombre</label>
                                <input id="displayName" type="text" class="form-control @error('displayName') is-invalid @enderror" name="displayName" value="{{ $survey->displayName }}" required autofocus>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row mb-2 mt-5">
                                        <div class="material-switch col-xs-1" style="margin-top: 10px">
                                            @if ($survey->tipo)
                                                <input id="tipo" name="tipo" type="checkbox" checked />
                                            @else
                                                <input id="tipo" name="tipo" type="checkbox" />
                                            @endif
                                            <label for="tipo" class="label-primary"></label>
                                        </div>

                                        <div class="col-xs-11">
                                            Encuesta para empresas/organizaciones
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="form-group">
                                <label for="description" class="col-form-label text-md-right">Descripción</label>
                                <textarea id="description" name="description" rows="3" class="form-control">
                                {{  $survey->description }}
                                </textarea>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row mb-2 mt-5">
                                        <div class="material-switch col-xs-1" style="margin-top: 10px">

                                            @if ($survey->validation)
                                                <input id="validation" name="validation" type="checkbox" checked />
                                            @else
                                                <input id="validation" name="validation" type="checkbox" />
                                            @endif
                                            <label for="validation" class="label-primary"></label>
                                        </div>
                                        <div class="col-xs-11">
                                            Validar datos de contacto?
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            @if ($survey->start_date AND $survey->end_date)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row mb-2 mt-5">
                                        <div class="material-switch col-xs-1" style="margin-top: 10px">
                                            @if ($survey->open)
                                                <input id="open" name="validation" type="checkbox" checked />
                                            @else
                                                <input id="open" name="validation" type="checkbox" />
                                            @endif
                                            <label for="open" class="label-primary"></label>
                                        </div>
                                        <div class="col-xs-11">
                                            Encuesta abierta
                                        </div>
                                    </div>
                                </li>
                            </ul>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="start_date" class="col-form-label text-md-right">Fecha inicio</label>

                                        <div class='input-group date' id='grp_start_date'>
                                            <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $survey->start_date }}" required readonly>
                                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label for="end_date" class="col-form-label text-md-right">Fecha final</label>

                                        <div class='input-group date' id='grp_end_date'>
                                            <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $survey->end_date }}" required readonly>
                                            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                        </div>

                                    </div>
                                </div>
                            @endif

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{route('surveys.index', ['id'=>$survey->period->period_id])}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header"> <h3>Preguntas </h3></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group">
                                    @if($survey->applySurveys->where('estatus', 1)->count() == 0)
                                        <a href="{{route('questions.create', ['id'=>$survey->id])}}" class="btn btn-success">Agregar pregunta</a>
                                    @endif
                                </div>
                                <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="30%">Nombre</th>
                                        <th width="30%">Pregunta</th>
                                        <th width="30%">Complemento</th>
                                        <th width="10%">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($survey->questions as $question)
                                        <tr>
                                            <td>{{ $question->name }} </td>
                                            <td>{!! $question->content !!}  </td>
                                            <td>{!! $question->complement !!}  </td>
                                            <td>
                                                @if($survey->applySurveys->where('estatus', 1)->count() == 0)
                                                    <a href="{{route('questions.edit', ['id'=>$question->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar pregunta"><i class="fas fa-edit"></i></a>
                                                    <form style="display: inline" method="POST" action="{{ route('questions.duplicate', [$question->id]) }}">
                                                        {!! csrf_field() !!}
                                                        <button type = "submit" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Duplicar pregunta"><i class="fas fa-copy"></i></button>
                                                    </form>
                                                    @if($question->options->count() == 0)
                                                        <a class="btn btn-danger btn-sm btnEliminarQuestion" data-toggle="tooltip" title="Eliminar la pregunta" data-id="{{ $question->id }}" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <p> No existen preguntas en la encuesta </p>
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
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.css") }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
    <script src="{{ asset("adminlte/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('description')

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

            $('.btnEliminarQuestion').click(function(e){

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
                                    url: "/question_delete/"+id,
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
