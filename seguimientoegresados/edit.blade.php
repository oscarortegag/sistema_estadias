@extends('layouts.master')

@section('header')
    <h1>Catalogo de egresados</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del egresado</h3></div>

                    <div class="card-body ">
                        <form  method="post" action="{{ route('Egresados.update', [$egresados->egresados_id]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    <ul>
                                        {{Session::get('flash_message')}}
                                    </ul>
                                </div>
                            @endif                            
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="apellido" class="col-form-label text-md-right">Apellido Paterno</label>
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" 
                                value="{{ $egresados->apellido_paterno }}" required autocomplete="apellido" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="apellidoma" class="col-form-label text-md-right">Apellido Materno</label>
                                <input id="apellidoma" type="text" class="form-control @error('apellidoma') is-invalid @enderror" name="apellidoma" 
                                value="{{ $egresados->apellido_materno }}" required autocomplete="apellidoma" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" 
                                value="{{ $egresados->nombre }}" required autocomplete="nombre" autofocus>
                            </div>
                        </div>
                        <div class="row">                         
                            <div class="form-group col-xs-4">
                                <label for="carrera" class="col-form-label text-md-right">Carrera</label>
                                <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" name="carrera" 
                                value="{{ $egresados->carrera }}" required autocomplete="nombre" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="correo" class="col-form-label text-md-right">Correo </label>
                                <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" 
                                value="{{ $egresados->correo_electronico }}" required autocomplete="correo" autofocus>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="form-group col-xs-4">
                                <label for="numero" class="col-form-label text-md-right">numero</label>
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" 
                                value="{{ $egresados->numero_telefono }}" required autocomplete="numero" autofocus>
                            </div>                            
                            <div class="form-group col-xs-4">
                                <label for="egreso" class="col-form-label text-md-right">Año de egreso</label>
                                <input id="egreso" type="text" class="form-control @error('egreso') is-invalid @enderror" name="egreso" 
                                value="{{ $egresados->año_egreso }}" required autocomplete="egreso" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="periodo" class="col-form-label text-md-right">periodo</label>
                                <input id="periodo" type="text" class="form-control @error('periodo') is-invalid @enderror" name="periodo" 
                                value="{{ $egresados->period_id }}" required autocomplete="periodo" autofocus>
                            </div>
                           
                        <div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar egresado</button>
                                <a href="{{ route('seguimientoegresados.visual') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
