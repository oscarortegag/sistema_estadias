@extends('layouts.master')

@section('header')
    <h1>Información alumno</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado</h3>
                        <!--<a href="{{route('enterprise.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Nueva empresa
                        </a><br><br>-->
                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Matrícula</th>
                                    <th>CURP</th>
                                    <th>Correo institucional</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($student as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->name." ".$items->lastName." ".$items->motherLastName}}</td>
                                        <td>{{ $items->enrollment}}</td>
                                        <td>{{ $items->curp}}</td>
                                        <td>{{ $items->institutionalEmail}}</td>  
                                        <td>
                                            <a href="{{ route('studentcontact.edit',['id'=>Crypt::encrypt($items->student_id)]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar información alumno"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <p>No existen empresas</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
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
    <script src="/js/admin/vinculacion/seguimiento/kinships/index.js"></script>
@endpush


