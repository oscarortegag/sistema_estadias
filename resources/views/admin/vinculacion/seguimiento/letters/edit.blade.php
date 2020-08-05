@extends('layouts.master')

@section('header')
    <h1>Proyecto de estadía</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <!--<div class="card-header"><center><h3>Confirmar nombre del proyecto</h3></center></div><br>-->
                    <div class="card-body ">
                        <form name="frmcontact" method="post" action="{{ route('presentation.update', [Crypt::encrypt($student->document->oficialDocument_id)]) }}">
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
                                    <div class="form-group col-xs-12">
                                        <label for="project" class="col-form-label text-md-right">Introducir el nombre de su proyecto:</label>
                                        <textarea class="form-control @error('project') is-invalid @enderror" id="project" name="project" rows="3" required autocomplete="project" autofocus>{{ $student->document->project }}</textarea>
                                    </div>                                                               
                                </div>
                                <div class="row">
                                     <div class="form-group"><center>
                                        <button type="submit" name="valida" id="valida2" class="btn btn-primary">Guardar</button>&nbsp;
                                        <a href="{{ route('presentation.index') }}" class="btn btn-default">Cancelar</a>
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