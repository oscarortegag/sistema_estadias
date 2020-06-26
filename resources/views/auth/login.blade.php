@extends('layouts.encuesta')


<style>
    div .polaroid {
        width: 500px;
        background-color: white;
        box-shadow: 0 20px 20px -16px rgba(9,9,16,.2);
    }


</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 200px">

            <div class="col-md-offset-3 col-md-6 ">
                <div class="box polaroid" >
                    <div class="box-header">
                        <h2 class="box-title">Acceso al sistema</h2>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-right">Correo electrónico</label>

                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-right">Contraseña</label>

                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Accesar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
