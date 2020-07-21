
@extends('layouts.master')

@section('header')
    <h1>Importar archivos</h1>
@stop

@section('content')

    <div class="container">

        <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header"> <h3>Alumnos </h3></div>
                    <div class="card-body">
                        <form name="frm" method="post" action="{{ route('imports.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="archivo">
                            <br><br>
                            <input type="submit" value="Enviar">
                        </form>                        
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


