
@extends('layouts.master')

@section('header')
   <h1>Listado de encuestas </h1>
@stop

@section('content')

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Encuestas </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="30%">Nombre</th>
                                <th width="60%">Descripción</th>
                                <th width="10%">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($student->surveys as $survey)
                                <tr>
                                    <td>{{ $survey->survey->displayName }}</td>
                                    <td>{!! $survey->survey->description !!}</td>
                                    <td>
                                        @if($survey->status == 1)
                                            <span class="label label-success">encuesta contestada</span>
                                        @else
                                            <a href="{{ route("surveys.answer", ['id'=>$survey->id]) }}" class="btn btn-warning">Contestar encuesta</a>
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
            <script src="{{ asset("adminlte/datatables.net/js/jquery.dataTables.js") }}"></script>
            <script src="{{ asset("adminlte/datatables.net-bs/js/dataTables.bootstrap.js") }}"></script>
            <script src="{{ asset("js/admin/vinculacion/seguimiento/surveys/index.js") }}"></script>
    @endpush


