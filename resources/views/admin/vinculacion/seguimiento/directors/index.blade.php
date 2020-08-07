@extends('layouts.master')

@section('header')
    <h1>Director académico</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado</h3>
                        <a href="{{route('directors.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Nuevo director académico
                        </a><br><br>
                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>División académica</th>
                                    <th>Género</th>
                                    <th>Correo electrónico</th>
                                    <th>Teléfono</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($director as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->nameDirector}}</td>
                                        <td>{{ $items->division->nameDivision }}</td>
                                        <td>{{ $items->gender->name}}</td>
                                        <td>{{ $items->nameEmail}}</td>
                                        <td>{{ $items->directorPhone}}</td> 
                                        <td>
                                            <a href="{{ route('directors.edit', ['id'=>$items->academicDirector_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos director académico"></i></a>
                                            <form style="display: inline" method="post" action="{{ route('directors.destroy', ['id'=>$items->academicDirector_id]) }}">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar datos director académico"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <p>No existen asesores académicos</p>
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


