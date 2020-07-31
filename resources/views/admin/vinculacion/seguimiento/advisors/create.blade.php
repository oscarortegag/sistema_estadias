@extends('layouts.master')

@section('header')
    <h1>Asesor académico</h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo asesor académico</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('advisors.store') }}">
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
                                    <label for="nombreacademico" class="col-form-label text-md-right">Nombre del asesor</label>
                                    <input id="nombreacademico" type="text" class="form-control @error('nombreacademico') is-invalid @enderror" name="nombreacademico" 
                                    value="{{ old('nombreacademico') }}" required autocomplete="nombreacademico" autofocus>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="form-group">
                                    <label for="cargoasesor" class="col-form-label text-md-right">Cargo</label>
                                    <input id="cargoasesor" type="text" class="form-control @error('cargoasesor') is-invalid @enderror" name="cargoasesor" 
                                    value="{{ old('cargoasesor') }}" required autocomplete="cargoasesor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="correoasesor" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correoasesor" type="text" class="form-control @error('correoasesor') is-invalid @enderror" name="correoasesor" 
                                    value="{{ old('correoasesor') }}" required autocomplete="correoasesor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="telefonoasesor" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonoasesor" type="text" class="form-control @error('telefonoasesor') is-invalid @enderror" name="telefonoasesor" 
                                    value="{{ old('telefonoasesor') }}" required autocomplete="telefonoasesor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('advisors.index') }}" class="btn btn-default">Cancelar</a>
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
