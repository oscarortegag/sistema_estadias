@extends('layouts.master')

@section('header')
    <h1>Asesor académico</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3> Actualizar datos del asesor</h3></div>

                    <div class="card-body ">
                        <form  method="post" action="{{ route('editors.update', [$editor->editorialAdvisor_id]) }}">
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
                                <div class="form-group">
                                    <label for="nombreeditor" class="col-form-label text-md-right">Nombre del asesor</label>
                                    <input id="nombreeditor" type="text" class="form-control @error('nombreeditor') is-invalid @enderror" name="nombreeditor"
                                    value="{{ $editor->nameEditorialAdvisor }}" required autocomplete="nombreeditor" autofocus>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="form-group">
                                    <label for="cargoeditor" class="col-form-label text-md-right">Cargo</label>
                                    <input id="cargoeditor" type="text" class="form-control @error('cargoeditor') is-invalid @enderror" name="cargoeditor" 
                                    value="{{ $editor->editorialPosition }}" required autocomplete="cargoeditor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="correoeditor" class="col-form-label text-md-right">correo electrónico</label>
                                    <input id="correoeditor" type="text" class="form-control @error('correoeditor') is-invalid @enderror" name="correoeditor" 
                                    value="{{ $editor->editorialAdvisorEmail }}" required autocomplete="correoeditor" autofocus>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="form-group">
                                    <label for="telefonoeditor" class="col-form-label text-md-right">Teléfono</label>
                                    <input id="telefonoeditor" type="text" class="form-control @error('telefonoeditor') is-invalid @enderror" name="telefonoeditor" 
                                    value="{{ $editor->editorialAdvisorPhone }}" required autocomplete="telefonoeditor" autofocus>
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
                </div>
            </div>
        </div>
    </div>
@stop



