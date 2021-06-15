@extends('layouts.master')

@section('header')
    <h1>Catálogo de egresados </h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo alumno egresado</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('Egresados.store') }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="apellido" class="col-form-label text-md-right">Apellido paterno</label>
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" 
                                value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="apellidoma" class="col-form-label text-md-right">Apellido Materno</label>
                                <input id="apellidoma" type="text" class="form-control @error('apellidoma') is-invalid @enderror" name="apellidoma" 
                                value="{{ old('apellidoma') }}" required autocomplete="apellidoma" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" 
                                value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                            </div>
                        </div>
                        <div class="row">                         
                            <div class="form-group col-xs-4">
                                <label for="carrera" class="col-form-label text-md-right">Nombre del carrera</label>
                                <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" name="carrera" 
                                value="{{ old('carrera') }}" required autocomplete="nombre" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="correo" class="col-form-label text-md-right">correo</label>
                                <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" 
                                value="{{ old('correo') }}" required autocomplete="correo" autofocus>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="form-group col-xs-4">
                                <label for="numero" class="col-form-label text-md-right">Numero telefono</label>
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" 
                                value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                            </div>                            
                            <div class="form-group col-xs-4">
                                <label for="egreso" class="col-form-label text-md-right">Año de egreso</label>
                                <input id="egreso" type="text" class="form-control @error('egreso') is-invalid @enderror" name="egreso" 
                                value="{{ old('egreso') }}" required autocomplete="egreso" autofocus>
                            
                            
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="periodo" class="col-form-label text-md-right">Periodo</label>
                                <input id="periodo" type="text" class="form-control @error('periodo') is-invalid @enderror" name="periodo" 
                                value="{{ old('periodo') }}" required autocomplete="periodo" autofocus>
                            
                            
                            </div>
                           
                        </div>
                        
                        <div class="row">                                                                               
                                <div class="form-group mb-0">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('Egresados.index') }}" class="btn btn-default">Cancelar</a>
                                        </div>
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
