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
                        <h3>Nuevo grupo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('groups.store') }}">
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
                                    <label for="group" class="col-form-label text-md-right">Grupo</label>
                                    <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group"
                                    value="{{ old('group') }}" required autocomplete="group" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="generation" class="col-form-label text-md-right">Generación
                                    <input id="generation" type="text" class="form-control @error('generation') is-invalid @enderror" name="generation"
                                    value="{{ old('generation') }}" required autocomplete="generation" autofocus>
                                </div>
                            </div>                                                            
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group col-xs-8">
                                            <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                                            <a href="{{ route('groups.index') }}" class="btn btn-default">Cancelar</a>
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
