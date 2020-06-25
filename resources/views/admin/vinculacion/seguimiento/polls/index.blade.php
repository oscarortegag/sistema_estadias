
@extends('layouts.master')

@section('header')
    <h1>Listado de encuestas ({{ $period->displayName . " / " . date("Y", strtotime($period->year)) }})</h1>
@stop

@section('content')

    <div class="container">

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Encuestas </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <a href="#" class="btn btn-success">Agregar encuesta</a>
                            </div>
                        <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($polls as $poll)
                                <tr>
                                    <td>{{ $poll->displayName }} </td>
                                    <td>{{ $poll->description  }}  </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos del alumno"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Aplicar encuesta a estudiantes"><i class="fas fa-copy"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
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


