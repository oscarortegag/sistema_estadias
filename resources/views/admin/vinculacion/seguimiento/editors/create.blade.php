@extends('layouts.master')

@section('header')
    <h1>Asesor de redacción</h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo asesor redacción</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('editors.store') }}">
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
                                    <label for="nombreeditor" class="col-form-label text-md-right">Nombre del asesor</label>
                                    <input id="nombreeditor" type="text" class="form-control @error('nombreeditor') is-invalid @enderror" name="nombreeditor" 
                                    value="{{ old('nombreeditor') }}" required autocomplete="nombreeditor" autofocus>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="form-group">
                                    <label for="cargoeditor" class="col-form-label text-md-right">Cargo</label>
                                    <input id="cargoeditor" type="text" class="form-control @error('cargoeditor') is-invalid @enderror" name="cargoeditor" 
                                    value="{{ old('cargoeditor') }}" required autocomplete="cargoeditor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="correoeditor" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correoeditor" type="text" class="form-control @error('correoeditor') is-invalid @enderror" name="correoeditor" 
                                    value="{{ old('correoeditor') }}" required autocomplete="correoeditor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="telefonoeditor" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonoeditor" type="text" class="form-control @error('telefonoeditor') is-invalid @enderror" name="telefonoeditor" 
                                    value="{{ old('telefonoeditor') }}" required autocomplete="telefonoeditor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>
                                            <a href="{{ route('editors.index') }}" class="btn btn-default">Cancelar</a>
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
