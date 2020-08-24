@extends('layouts.master')

@section('header')
    <h1>Catalogo de color</h1>
@stop

@section('content')
    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo Color</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('colors.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label text-md-right">Nombre</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for = "code" class="col-form-label text-md-right">
                                    Color
                                </label>
                                <div id="code" class="input-group colorpicker-component">
                                    <input id="code" type="text" class="form-control"  name="code" value="{{ old('code') }}" required>
                                    <span class="input-group-addon"><i></i></span>
                                    <p class="help-block"></p>
                                    @if($errors->has('code'))
                                        <p class="help-block">
                                            {{ $errors->first('code') }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('colors.index') }}" class="btn btn-default">Regresar</a>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

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

