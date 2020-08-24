@extends('layouts.master')

@section('header')
    <h1>Catalogo de colores</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del color</h3></div>

                    <div class="card-body ">
                        <form  method="POST" action="{{ route('colors.update', [$color->id]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for = "name" class="col-form-label text-md-right">
                                    Nombre
                                </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $color->name }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label for = "code" class="col-form-label text-md-right">
                                    Color
                                </label>
                                <div id="code" class="input-group colorpicker-component">
                                    <input type="text" name="code" value="{{ $color->code }}" class="form-control" required/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('colors.index') }}" class="btn btn-default">Regresar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css") }}">
@endpush

@push('scripts')
    <script src="{{ asset("adminlte/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js") }}"></script>

    <script>
        $(document).ready(function() {
            $('#code').colorpicker();
        });
    </script>
@endpush




