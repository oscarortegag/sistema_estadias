@extends('layouts.master')

@section('header')
    <h1>Usuarios del sistema</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Usuarios </h3>
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Nuevo usuario
                        </a>
                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-usuarios" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="25%">Nombre</th>
                                    <th width="25%">Correo electrónico</th>
                                    <th width="15%">Rol usuario</th>
                                    <th width="15%">Contraseña</th>
                                    <th width="10%">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($data as $user)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->code }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['id'=>$user->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos del usuario"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <p> No existen usuarios </p>
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
    <script src="/js/users/index.js"></script>
@endpush


