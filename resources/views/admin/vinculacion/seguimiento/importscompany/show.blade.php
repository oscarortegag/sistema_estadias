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
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($importerRowFailData as $items)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>
                                        <td>{{ $items["A"]}}</td>
                                        <td>{{ $items["B"]}}</td>
                                        <td>{{ $items["C"]}}</td>
                                        <td>{{ $items["D"]}}</td>
                                        <td>{{ $items["E"]}}</td>
                                        <td>{{ $items["H"]}}</td>                                   
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <center>
                                            <p class="text-light-blue">La información se completo exitosamente.</p></center>
                                            </center>
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


