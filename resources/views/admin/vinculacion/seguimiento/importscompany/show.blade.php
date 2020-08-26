@extends('layouts.master')

@section('header')
    <h1>Resultados de la importación</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-envelope-o"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Importados:</span>
                              <span class="info-box-number">{{ $importerRow }}</span>
                              <span class="info-box-text">No importados:</span>
                               <span class="info-box-number">{{ $importerRowFail }}</span>                                                          
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>                        
                    </div>    
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-importer" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>nombreEmpresa</th>
                                    <th>razonSocial</th>
                                    <th>nombreRepresentate</th>
                                    <th>cargoRepresentante</th>
                                    <th>nombreAsesorEmpresarial</th>
                                    <th>nombreContactoEmpresarial</th>
                                    <th>Errores en las columnas</th>                                                      
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($importerRowFailData as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items[0]["A"]}}</td>
                                        <td>{{ $items[0]["B"]}}</td>
                                        <td>{{ $items[0]["C"]}}</td>
                                        <td>{{ $items[0]["D"]}}</td>
                                        <td>{{ $items[0]["E"]}}</td>
                                        <td>{{ $items[0]["H"]}}</td>
                                        <td>
                                            <span class="label label-warning">{{ $items[1] }}</span>
                                        </td>                                                                          
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <center>
                                            <p class="text-light-blue">La información se completo exitosamente.</p></center>
                                            </center>
                                        </td>
                                    </tr>
                                @endforelse
                                @if($importerRowFail > 0)
                                    <tr>
                                        <td colspan="9">
                                          <div class="alert alert-danger alert-dismissible">
                                            Los registros no importados presentan errores o están duplicados, revise las columnas especificados en su archivo de importación.
                                          </div>
                                        </td>
                                    </tr>
                                @endif                                 
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


