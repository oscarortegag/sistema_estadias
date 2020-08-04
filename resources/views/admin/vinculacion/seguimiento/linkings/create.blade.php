@extends('layouts.master')

@section('header')
    <h1>Responsable de vinculación</h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo responsable de vinculación</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('linkings.store') }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="form-group">
                                    <label for="nombrevinculacion" class="col-form-label text-md-right">Nombre del responsable de vinculación</label>
                                    <input id="nombrevinculacion" type="text" class="form-control @error('nombrevinculacion') is-invalid @enderror" name="nombrevinculacion" 
                                    value="{{ old('nombrevinculacion') }}" required autocomplete="nombrevinculacion" autofocus>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="form-group">
                                    <label for="cargovinculacion" class="col-form-label text-md-right">Cargo</label>
                                    <input id="cargovinculacion" type="text" class="form-control @error('cargovinculacion') is-invalid @enderror" name="cargovinculacion" 
                                    value="{{ old('cargovinculacion') }}" required autocomplete="cargovinculacion" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="correovinculacion" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correovinculacion" type="text" class="form-control @error('correovinculacion') is-invalid @enderror" name="correovinculacion" 
                                    value="{{ old('correovinculacion') }}" required autocomplete="correovinculacion" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="telefonovinculacion" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonovinculacion" type="text" class="form-control @error('telefonovinculacion') is-invalid @enderror" name="telefonovinculacion" 
                                    value="{{ old('telefonovinculacion') }}" required autocomplete="telefonovinculacion" autofocus>
                                </div>
                            </div>                                
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('linkings.index') }}" class="btn btn-default">Cancelar</a>
                                        </div>
                                    </center>
                                </div>
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
