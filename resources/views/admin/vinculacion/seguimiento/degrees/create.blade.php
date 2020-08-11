@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nueva carrera</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('degrees.store') }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="codigo" class="col-form-label text-md-right">Código</label>
                                    <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                    value="{{ old('codigo') }}" required autocomplete="codigo" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="carrera" class="col-form-label text-md-right">Carrera</label>
                                    <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" name="carrera"
                                    value="{{ old('carrera') }}" required autocomplete="carrera" autofocus>
                                </div>
                            </div>                                                          
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group col-xs-8">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{ route('degrees.index') }}" class="btn btn-default">Cancelar</a>
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
