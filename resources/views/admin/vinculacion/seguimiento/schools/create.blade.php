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
                        <h3>Nueva escuela</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('schools.store') }}">
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
                                    <label for="school" class="col-form-label text-md-right">Preparatoria</label>
                                    <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school"
                                    value="{{ old('school') }}" required autocomplete="school" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="siglas" class="col-form-label text-md-right">Siglas</label>
                                    <input id="siglas" type="text" class="form-control @error('siglas') is-invalid @enderror" name="siglas"
                                    value="{{ old('siglas') }}" required autocomplete="siglas" autofocus>
                                </div>
                            </div>                                                          
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group col-xs-8">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{ route('schools.index') }}" class="btn btn-default">Cancelar</a>
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
