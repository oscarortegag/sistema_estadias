
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
                        <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="25%">Nombre</th>
                                <th width="60%">Descripción</th>
                                <th width="10%">Avance</th>
                                <th width="5%">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($period->surveys as $survey)
                                <tr>
                                    <td>{{ $survey->displayName }}</td>
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
                                            <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos de la encuesta a estudiantes"><i class="fas fa-edit"></i></a>
                                            @if(!$survey->open)
                                                <a href="{{route('surveys.apply',['id'=>$survey->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Aplicar encuesta a estudiantes"><i class="fas fa-copy"></i></a>
                                            @endif
                                            @if($survey->questions->count() == 0)
                                                <form style="display: inline" method="POST" action="{{ route("surveys.destroy",[$survey->id]) }}">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}

                                                    <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar datos de encuesta"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
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
            <link rel="stylesheet" href="/adminlte/datatables.net-bs/css/dataTables.bootstrap.css">
        @endpush

        @push('scripts')
            <script src="/adminlte/datatables.net/js/jquery.dataTables.js"></script>
            <script src="/adminlte/datatables.net-bs/js/dataTables.bootstrap.js"></script>
            <script src="/js/admin/vinculacion/seguimiento/surveys/index.js"></script>
    @endpush


