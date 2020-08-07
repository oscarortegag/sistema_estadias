@extends('layouts.master')

@section('header')
    <h1>Asesor académico</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del director</h3></div>

                    <div class="card-body ">
                        <form  method="post" action="{{ route('directors.update', [$director->academicDirector_id]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="nombreDirector" class="col-form-label text-md-right">Nombre del director académico</label>
                                    <input id="nombreDirector" type="text" class="form-control @error('nombreDirector') is-invalid @enderror" name="nombreDirector"
                                    value="{{ $director->nameDirector }}" required autocomplete="nombreDirector" autofocus>
                                </div>                               
                            </div>                                                           
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="gender" class="col-form-label text-md-right">Género</label>
                                    <select name="gender" id="gender" required class="form-control @error('gender') is-invalid @enderror">
                                            @foreach($gender as $items)
                                                @if($items->gender_id == $director->gender->gender_id)
                                                    <option value="{{ $items->gender_id }}" selected>{{ $items->name }}</option>
                                                @else
                                                    <option value="{{ $items->gender_id }}">{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                                                           
                                <div class="form-group col-xs-4">
                                    <label for="correoDirector" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correoDirector" type="text" class="form-control @error('correoDirector') is-invalid @enderror" name="correoDirector" 
                                    value="{{ $director->nameEmail }}" required autocomplete="correDirectorr" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="telefonoDirector" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonoDirector" type="text" class="form-control @error('telefonoDirector') is-invalid @enderror" name="telefonoDirector" 
                                    value="{{ $director->directorPhone }}" required autocomplete="telefonoDirector" autofocus>
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="division" class="col-form-label text-md-right">División académica</label>
                                    <select name="division" id="division" required class="form-control @error('division') is-invalid @enderror">
                                            @foreach($division as $items)
                                                @if($items->academicDivision_id == $director->division->academicDivision_id)
                                                    <option value="{{ $items->academicDivision_id }}" selected>{{ $items->nameDivision }}</option>
                                                @else
                                                    <option value="{{ $items->academicDivision_id }}">{{ $items->nameDivision }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                                
                            </div>                                
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('directors.index') }}" class="btn btn-default">Cancelar</a>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



