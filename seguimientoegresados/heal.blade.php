@extends('layouts.master')

@section('header')
    <h1>Seguimiento de Egresados</h1>
@stop

@section('content')
    <style>
        .card-header .fa {
            transition: .3s transform ease-in-out;
        }
        .card-header .collapsed .fa {
            transform: rotate(90deg);
        }
    </style>
    <div class="container">

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>periodos </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="tabla-periodo" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Periodo</th>
                                <th>Acciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($periodos as $periodo)
                                <tr>
                                    <td>{{ $periodo->nombre }} </td>
                                    <td>
                                        <a href="{{route('seguimientoegresados.visual', ['id'=>$periodo->period_id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Alumnos"><i class="fas fa-address-book"></i></a>
                                        <a href="{{route('surveys.index', ['id'=>$periodo->period_id])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Encuestas"><i class="fas fa-file-invoice"></i></a>
                                        <a href="{{route('statistics.index', ['id'=>$periodo->period_id])}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Estadisticas"><i class="fas fa-chart-bar"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <p> No existen periodos </p>
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
            <script src="{{ asset("js/admin/vinculacion/seguimiento/index.js") }}"></script>
    @endpush
