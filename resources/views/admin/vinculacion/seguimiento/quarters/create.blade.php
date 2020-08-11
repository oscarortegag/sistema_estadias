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
                        <h3>Nuevo cuatrimestre</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('quarters.store') }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="number" class="col-form-label text-md-right">Número ordinario</label>
                                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ old('number') }}" required autocomplete=number" placeholder="Ejemplo: 1" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="quarterName" class="col-form-label text-md-right">Cuatrimestre</label>
                                    <input id="quarterName" type="text" class="form-control @error('quarterName') is-invalid @enderror" name="quarterName"
                                    value="{{ old('quarterName') }}" required autocomplete="quarterName" placeholder="Ejemplo: Primer cuatrimestre" autofocus>
                                </div>
                            </div>                                                            
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group col-xs-8">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{ route('quarters.index') }}" class="btn btn-default">Cancelar</a>
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
