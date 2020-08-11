@extends('layouts.master')

@section('header')
    <h1>Documentación del alumno</h1>
@stop

@section('content')
    <div class="container box">
            <div class="row justify-content-center">
                <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Listado de documentos</h3>
                    </div>
                    @if($information->student->verified)
                        @php
                            $msg = "<p class=\"text-green\">Disponible</p>";
                        @endphp
                    @else
                        @php
                            $msg = "<p class=\"text-red\">Tiene pendiente complementar sus datos de contacto</p>";
                        @endphp                    
                    @endif

                    @if($status)
                        @if(!is_null($information->student->document->project))
                            @php
                                $msg2 = "<p class=\"text-green\">Disponible</p>";
                            @endphp
                        @else
                            @php
                                $msg2 = "<p class=\"text-red\">Falta agregar el nombre del proyecto</p>";
                            @endphp
                        @endif
                    @else
                        @php
                            $msg2 = "<p class=\"text-red\">Aun no ha contestado la encuesta</p>";
                        @endphp
                    @endif
                    <div class="card-body">
                          <div class="table-responsive">
                              <table id="tabla-parentescos" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Asesor académico</th>
                                    <th>Documento</th>
                                    <th>Estatus</th>                                    
                                    <th colspan="2">Descargar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $information->student->name." ".$information->student->lastName." ".$information->student->motherLastName }}</td>
                                        <td>{{ $information->student->document->advisor->nameAcademicAdvisor }}</td>
                                        <td><span class="label label-primary">Carta de presentación</span></td>
                                        <td>{!! $msg !!}</td>
                                        <td></td>                                         
                                        <td>
                                            @if($information->student->verified)
                                            <a href="{{ route('word.index',['doc'=>'1']) }}" <i class="fa fa-file-word-o" aria-hidden="true" data-toggle="tooltip" title="Descargar carta de presentación"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $information->student->name." ".$information->student->lastName." ".$information->student->motherLastName }}</td>
                                        <td>{{ $information->student->document->advisor->nameAcademicAdvisor }}</td>
                                        <td><span class="label label-success">Carta de liberación</span></td>
                                        <td>{!! $msg2 !!}</td>
                                        <td></td>                                         
                                        <td>
                                            @if($status)
                                                @if(!is_null($information->student->document->project))
                                                <a href="{{ route('word.index',['doc'=>'2']) }}" <i class="fa fa-file-word-o" aria-hidden="true" data-toggle="tooltip" title="Descargar carta de liberación"></i></a>&nbsp;
                                                @endif                                                
                                                <a href="{{ route('presentation.edit',['id'=>Crypt::encrypt($information->student->student_id)]) }}" <i class="fa fa-mortar-board" aria-hidden="true" data-toggle="tooltip" title="Agregar proyecto"></i></a>
                                            @endif                           
                                        </td>
                                    </tr>                                    
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


