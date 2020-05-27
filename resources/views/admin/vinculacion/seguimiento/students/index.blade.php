
@extends('layouts.master')

@section('header')
    <h1>Listado de alumnos ({{ $period->displayName }})</h1>
@stop

@section('content')

    <div class="container">

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Alumnos </h3></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <a href="#" class="btn btn-success">Agregar alumno</a>
                            </div>
                            <input type="hidden" id="periodId" name="periodId" value={{$period->id}}>
                        <table id="tabla-alumnos" class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Especialidad</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->enrollment }} </td>
                                    <td>{{ $student->fullName  }}  </td>
                                    <td>{{ $student->especialidad  }}  </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos del alumno"><i class="fas fa-edit"></i></a>
                                    </td>
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
            <script src="/js/admin/vinculacion/seguimiento/students/index.js"></script>
    @endpush


