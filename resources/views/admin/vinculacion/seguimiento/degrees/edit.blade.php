@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3>Modificar carrera</h3></div><br>
                    <div class="card-body ">
                            <form name="frmdeg" method="post" action="{{ route('degrees.update', [$degree->degree_id]) }}">
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
                                <div class="form-group col-xs-12">
                                    <label for="codigo" class="col-form-label text-md-right">Código</label>
                                    <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                    value="{{ $degree->code }}" required autocomplete="codigo" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="carrera" class="col-form-label text-md-right">Carrera</label>
                                    <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" name="carrera"
                                    value="{{ $degree->degreeName }}" required autocomplete="carrera" autofocus>
                                </div>
                            </div>                               
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('degrees.index') }}" class="btn btn-default">Cancelar</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
