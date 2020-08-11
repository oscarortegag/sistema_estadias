@extends('layouts.master')

@section('header')
    <h1>Catálogo</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><h3>Modificar periodo</h3></div><br>
                    <div class="card-body ">
                            <form name="frmdeg" method="post" action="{{ route('periods.update', [$period->period_id]) }}">
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
                                    <label for="quarter" class="col-form-label text-md-right">Cuatrimestre</label>
                                    <input id="quarter" type="text" class="form-control @error('quarter') is-invalid @enderror" name="quarter"
                                    value="{{ $period->name }}" required autocomplete="quarter" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="year" class="col-form-label text-md-right">Año</label>
                                    <select name="year" id="year" required class="form-control @error('year') is-invalid @enderror">
                                            @for($i=2020; $i <= 2022; $i++)
                                                 @if($period->year == $i)
                                                     <option value="{{ $i }}" selected>{{ $i }}</option>
                                                 @else
                                                     <option value="{{ $i }}">{{ $i }}</option>
                                                 @endif 
                                            @endfor
                                    </select>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="firstDay" class="col-form-label text-md-right">Fecha inicio</label>
                                    <input id="firstDay" type="text" class="form-control @error('firstDay') is-invalid @enderror" name="firstDay"
                                    value="{{ $period->firstDay }}" required autocomplete="firstDay" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="lastDay" class="col-form-label text-md-right">Fecha fin</label>
                                    <input id="lastDay" type="text" class="form-control @error('lastDay') is-invalid @enderror" name="lastDay"
                                    value="{{ $period->lastDay }}" required autocomplete="lastDay" autofocus>
                                </div>                                
                            </div>
                            <div class="row">

                            </div>                               
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('periods.index') }}" class="btn btn-default">Cancelar</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('jscustom')
<script type="text/javascript">
/*
    $(document).ready(function () {
        $("#valida2").click(function() {
            var correoBase,correoPersonal,correoConfirma,celular,telefono,facebook;
            correoPersonal = $("#correoPersonal").val();
            correoConfirma = $("#correoPersonalConfirma").val();
            celular = $("#telCelular").val();
            telefono = $("#telOficina").val();
            facebook = $("#facebook").val();                                    

            if((correoPersonal == "") || (correoConfirma=="") || (celular=="") || (facebook=="")){
                alert("¡Especifique la información de contacto!");
                return false;                
            }

            if(correoPersonal !== correoConfirma){
               alert("¡Verifique el correo personal no coinciden!");
               return false;
            }

            correoBase = $("#correo").val();
            tmpCorreo = correoBase.split("@");
            tmpCorreoP = correoPersonal.split("@");

            if(tmpCorreoP[1] === tmpCorreo[1]){
                alert("El correo personal no debe ser tipo institucional");
                return false;
            }

            if(confirm("¿ Desea registrar su información de contacto ?")){
               return true;
            }else{
                  return false;
            }

        });
    });*/
</script>
@endpush