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
                    <div class="card-header"><h3>Modificar división académica</h3></div><br>
                    <div class="card-body ">
                            <form name="frmdiv" method="post" action="{{ route('divisions.update', [$division->academicDivision_id]) }}">
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
                                        <label for="division" class="col-form-label text-md-right">Nombre de la división académica</label>
                                        <input id="division" type="text" class="form-control @error('division') is-invalid @enderror" name="division"
                                        value="{{ $division->nameDivision }}" required autocomplete="division" autofocus>
                                    </div>
                                </div>                              
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('divisions.index') }}" class="btn btn-default">Cancelar</a>
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
