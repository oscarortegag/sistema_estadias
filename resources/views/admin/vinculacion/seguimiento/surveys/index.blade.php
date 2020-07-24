
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
                                <th width="30%">Nombre</th>
                                <th width="60%">Descripción</th>
                                <th width="10%">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($period->surveys as $survey)
                                <tr>
                                    <td>{{ $survey->displayName }}</td>
                                    <td>{!! $survey->description !!}</td>
                                    <td>
                                        <a href="{{route('surveys.edit',['id'=>$survey->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos del alumno"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Aplicar encuesta a estudiantes"><i class="fas fa-copy"></i></a>
                                        @if($survey->questions->count() == 0)
                                        <form style="display: inline" method="POST" action="{{ route("surveys.destroy",[$survey->id]) }}">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}

                                            <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar datos de encuesta"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
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
            <script src="/js/admin/vinculacion/seguimiento/polls/index.js"></script>
    @endpush


