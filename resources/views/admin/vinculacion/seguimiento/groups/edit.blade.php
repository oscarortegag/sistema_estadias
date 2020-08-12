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
                    <div class="card-header"><h3>Modificar grupo</h3></div><br>
                    <div class="card-body ">
                            <form name="frmgro" method="post" action="{{ route('groups.update', [$group->group_id]) }}">
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
                                        <label for="group" class="col-form-label text-md-right">Grupo</label>
                                        <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group"
                                        value="{{ $group->name }}" required autocomplete="group" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <label for="generation" class="col-form-label text-md-right">Generación
                                        <input id="generation" type="text" class="form-control @error('generation') is-invalid @enderror" name="generation"
                                        value="{{ $group->generation }}" required autocomplete="generation" autofocus>
                                    </div>
                                </div>                               
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('groups.index') }}" class="btn btn-default">Cancelar</a>
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
