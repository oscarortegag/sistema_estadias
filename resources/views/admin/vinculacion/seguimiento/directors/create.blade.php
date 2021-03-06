@extends('layouts.master')

@section('header')
    <h1>Director académico</h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nuevo director académico</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('directors.store') }}">
                            @csrf
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
                                    value="{{ old('nombreDirector') }}" required autocomplete="nombreDirector" autofocus>
                                </div>                               
                            </div>                                                           
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="gender" class="col-form-label text-md-right">Género</label>
                                    <select name="gender" id="gender" required class="form-control @error('gender') is-invalid @enderror">
                                            @foreach($gender as $items)
                                                    <option value="{{ $items->gender_id }}">{{ $items->name }}</option>
                                            @endforeach
                                    </select>
                                </div>                                                           
                                <div class="form-group col-xs-4">
                                    <label for="correoDirector" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correoDirector" type="text" class="form-control @error('correoDirector') is-invalid @enderror" name="correoDirector" 
                                    value="{{ old('correoDirector') }}" required autocomplete="correDirectorr" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="telefonoDirector" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonoDirector" type="text" class="form-control @error('telefonoDirector') is-invalid @enderror" name="telefonoDirector" 
                                    value="{{ old('telefonoDirector') }}" required autocomplete="telefonoDirector" autofocus>
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="division" class="col-form-label text-md-right">División académica</label>
                                    <select name="division" id="division" required class="form-control @error('division') is-invalid @enderror">
                                            @foreach($division as $items)
                                                    <option value="{{ $items->academicDivision_id }}">{{ $items->nameDivision }}</option>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
