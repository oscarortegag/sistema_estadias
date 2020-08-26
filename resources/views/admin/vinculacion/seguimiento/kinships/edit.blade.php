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
                    <div class="card-header"><h3> Actualizar datos del parentesco </h3></div>

                    <div class="card-body ">
                        <form  method="POST" action="{{ route('kinships.update', [$kinship->id]) }}">
                            {!! method_field('PUT') !!}
                            {!! csrf_field() !!}
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group">
                                <label for = "name" class="col-form-label text-md-right">
                                    Nombre
                                </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $kinship->name }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar parentesco</button>
                                <a href="{{ route('kinships.index') }}" class="btn btn-default">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



