@extends('layouts.master')

@section('header')
    <h1>Catálogo empresas</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado de empresas</h3>
                        <a href="{{route('enterprise.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Nueva empresa
                        </a><br><br>
                    </div>
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>Razón social</th>
                                    <th>Teléfono</th>
                                    <th>Representante</th>
                                    <th>Cargo</th>
                                    <th>Asesor empresarial</th>
                                    <th>Contacto empresarial</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($enterprise as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items->companyName}}</td>
                                        <td>{{ $items->businessName}}</td>
                                        <td>{{ $items->companyPhone}}</td>
                                        <td>{{ $items->representativeName}}</td>
                                        <td>{{ $items->representativePosition}}</td>
                                        <td>{{ $items->businessAdvisorName}}</td>
                                        <td>{{ $items->businessContactName}}</td>    
                                        <td>
                                            <a href="{{ route('enterprise.edit', ['id'=>$items->enterprise_id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="tooltip" title="Editar datos empresa"></i></a>
                                            <form style="display: inline" methosd="post" action="{{ route('enterprise.destroy', ['id'=>$items->enterprise_id]) }}">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar empresa"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
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


