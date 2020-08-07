@extends('layouts.master')

@section('header')
    <h1>Usuarios del sistema</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del usuario </h3></div>

                    <div class="card-body ">
                        <form  method="POST" action="{{ route('users.update',[$user->id]) }}">
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="form-group">
                                <label for = "email" class="col-form-label text-md-right">
                                    Correo electronico
                                </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-right">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                                <a href="{{ route('users.index') }}" class="btn btn-default">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



