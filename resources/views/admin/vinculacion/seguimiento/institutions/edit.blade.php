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
                    <div class="card-header"><h3>Modificar instituto</h3></div><br>
                    <div class="card-body ">
                            <form name="frminst" method="post" action="{{ route('institutions.update', [$institution->institution_id]) }}">
                                {!! method_field('PUT') !!}
                                {!! csrf_field() !!}
                                @if (count($errors)>0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        <ul>
                                            {{Session::get('flash_message')}}
                                        </ul>
                                    </div>
                                @endif                
                                <div class="row">
                                    <div class="form-group col-xs-8">
                                        <label for="instituto" class="col-form-label text-md-right">Descripción</label>
                                        <input id="instituto" type="text" class="form-control @error('instituto') is-invalid @enderror" name="instituto"
                                        value="{{ $institution->name }}" required autocomplete="instituto" autofocus>
                                    </div>
                                </div>                              
                                <div class="row">      
                                    <div class="form-group mb-0">
                                        <center>
                                            <div class="form-group col-xs-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('institutions.index') }}" class="btn btn-default">Cancelar</a>
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