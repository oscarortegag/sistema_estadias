@extends('layouts.master')

@section('header')
    <h1>Catalogo de empresas</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos de la empresa</h3></div>

                    <div class="card-body ">
                        <form  method="post" action="{{ route('enterprise.update', [$enterprise->enterprise_id]) }}">
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
                                <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                value="{{ $enterprise->companyName }}" required autocomplete="nombre" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="razonsocial" class="col-form-label text-md-right">Razón social</label>
                                <input id="razonsocial" type="text" class="form-control @error('razonsocial') is-invalid @enderror" name="razonsocial" value="{{ $enterprise->businessName }}" required autocomplete="razonsocial" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label text-md-right">Teléfono de la empresa</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" 
                                value="{{ $enterprise->companyPhone }}" required autocomplete="telefono" autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar empresa</button>
                                <a href="{{ route('enterprise.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



