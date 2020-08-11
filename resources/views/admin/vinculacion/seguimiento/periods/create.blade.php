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
                        <h3>Nuevo periodo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('periods.store') }}">
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
                                    <label for="quarter" class="col-form-label text-md-right">Cuatrimestre</label>
                                    <input id="quarter" type="text" class="form-control @error('quarter') is-invalid @enderror" name="quarter"
                                    value="{{ old('quarter') }}" required autocomplete="quarter" placeholder="Ejemplo: Mayo-Agosto" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="year" class="col-form-label text-md-right">Año</label>
                                    <select name="year" id="year" required class="form-control @error('year') is-invalid @enderror">
                                            @for($i=2020; $i <= 2022; $i++)
                                                 <option value="{{ $i }}" selected>{{ $i }}</option> 
                                            @endfor
                                    </select>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="firstDay" class="col-form-label text-md-right">Fecha inicio</label>
                                    <input id="firstDay" type="text" class="form-control @error('firstDay') is-invalid @enderror" name="firstDay"
                                    value="{{ old('firstDay') }}" required autocomplete="firstDay" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="lastDay" class="col-form-label text-md-right">Fecha fin</label>
                                    <input id="lastDay" type="text" class="form-control @error('lastDay') is-invalid @enderror" name="lastDay"
                                    value="{{ old('lastDay') }}" required autocomplete="lastDay" autofocus>
                                </div>                                
                            </div>          
                            <div class="row">      
                                <div class="form-group mb-0">
                                    <center>
                                        <div class="form-group col-xs-8">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{ route('periods.index') }}" class="btn btn-default">Cancelar</a>
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
