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
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" 
                                value="{{ $enterprise->companyName }}" required autocomplete="nombre" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-8">
                                <label for="razonsocial" class="col-form-label text-md-right">Razón social</label>
                                <input id="razonsocial" type="text" class="form-control @error('razonsocial') is-invalid @enderror" name="razonsocial" 
                                value="{{ $enterprise->businessName }}" required autocomplete="razonsocial" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="telefono" class="col-form-label text-md-right">Teléfono de la empresa</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" 
                                value="{{ $enterprise->companyPhone }}" required autocomplete="telefono" autofocus>
                            </div>
                        </div>
                        <div class="row">                         
                            <div class="form-group col-xs-4">
                                <label for="representante" class="col-form-label text-md-right">Nombre del representante</label>
                                <input id="representante" type="text" class="form-control @error('representante') is-invalid @enderror" name="representante" 
                                value="{{ $enterprise->representativeName }}" required autocomplete="nombre" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="cargo" class="col-form-label text-md-right">Cargo del representante</label>
                                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo" 
                                value="{{ $enterprise->representativePosition }}" required autocomplete="cargo" autofocus>
                            </div>
                        </div>
                        <div class="row col-xs-12">
                            <label for="carrera" class="col-form-label text-md-right">Información asesor empresarial</label>
                        </div>                         
                        <div class="row">
                            <div class="form-group col-xs-4">
                                <label for="nombreasesor" class="col-form-label text-md-right">Nombre del asesor</label>
                                <input id="nombreasesor" type="text" class="form-control @error('nombreasesor') is-invalid @enderror" name="nombreasesor" 
                                value="{{ $enterprise->businessAdvisorName }}" required autocomplete="nombreasesor" autofocus>
                            </div>                            
                            <div class="form-group col-xs-4">
                                <label for="correoasesor" class="col-form-label text-md-right">Correo del asesor</label>
                                <input id="correoasesor" type="text" class="form-control @error('correoasesor') is-invalid @enderror" name="correoasesor" 
                                value="{{ $enterprise->businessAdvisorEmail }}" required autocomplete="correoasesor" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="telefonoasesor" class="col-form-label text-md-right">Teléfono del asesor</label>
                                <input id="telefono" type="text" class="form-control @error('telefonoasesor') is-invalid @enderror" name="telefonoasesor" 
                                value="{{ $enterprise->businessAdvisorPhone }}" required autocomplete="telefonoasesor" autofocus>
                            </div>
                        </div>
                        <div class="row col-xs-12">
                            <label for="carrera" class="col-form-label text-md-right">Información contacto empresarial</label>
                        </div>                        
                        <div class="row">
                            <div class="form-group col-xs-4">
                                <label for="nombrecontacto" class="col-form-label text-md-right">Nombre del contacto</label>
                                <input id="nombrecontacto" type="text" class="form-control @error('nombrecontacto') is-invalid @enderror" name="nombrecontacto" 
                                value="{{ $enterprise->businessContactName }}" required autocomplete="nombrecontacto" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="correocontacto" class="col-form-label text-md-right">Correo del contacto</label>
                                <input id="correocontacto" type="text" class="form-control @error('correocontacto') is-invalid @enderror" name="correocontacto" 
                                value="{{ $enterprise->businessContactEmail }}" required autocomplete="correocontacto" autofocus>
                            </div>
                            <div class="form-group col-xs-4">
                                <label for="telefonocontacto" class="col-form-label text-md-right">Teléfono del contacto</label>
                                <input id="telefonocontacto" type="text" class="form-control @error('telefonocontacto') is-invalid @enderror" name="telefonocontacto" 
                                value="{{ $enterprise->businessContactPhone }}" required autocomplete="telefonocontacto" autofocus>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar empresa</button>
                                <a href="{{ route('enterprise.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



