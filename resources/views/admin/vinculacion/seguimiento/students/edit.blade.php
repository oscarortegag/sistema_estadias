@extends('layouts.master')

@section('header')
    <h1>Información alumno</h1>
@stop

@section('content')
    <div class="container box">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-primary">
                    <div class="card-header"><center><h3>Modificar información</h3></center></div><br>                 
                    <div class="card-body ">
                        <form name="frmcontact" method="post" action="{{ route('students.update', [Crypt::encrypt($student->student_id)]) }}">
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
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h3 class="box-title">Información del alumno y datos de contacto</h3>
                            </div>                             
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="university" class="col-form-label text-md-right">Institución educativa</label>
                                    <select name="university" id="university" required class="form-control @error('university') is-invalid @enderror">
                                            @foreach($institution as $items)
                                                @if($items->institution_id == $student->institution_id)
                                                    <option value="{{ $items->institution_id }}" selected>{{ $items->name }}</option>
                                                @else
                                                    <option value="{{ $items->institution_id }}">{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                                
                                <div class="form-group col-xs-4">
                                    <label for="period" class="col-form-label text-md-right">Periodo</label>
                                    <select name="period" id="period" required class="form-control @error('period') is-invalid @enderror">
                                            @foreach($period as $items)
                                                @if($items->period_id == $student->period_id)
                                                    <option value="{{ $items->period_id }}" selected>{{ $items->name." ".$items->year }}</option>
                                                @else
                                                    <option value="{{ $items->period_id }}">{{ $items->name." ".$items->year }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>                                                                                   
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="nombre" class="col-form-label text-md-right">Nombre</label>
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ $student->name }}" required autocomplete="nombre" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="apellidoPat" class="col-form-label text-md-right">Apellido paterno</label>
                                    <input id="apellidoPat" type="text" class="form-control @error('apellidoPat') is-invalid @enderror" name="apellidoPat" value="{{ $student->lastName }}" required autocomplete="apellidoPat" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="apellidoMat" class="col-form-label text-md-right">Apellido materno</label>
                                    <input id="apellidoMat" type="text" class="form-control @error('apellidoMat') is-invalid @enderror" name="apellidoMat" 
                                    value="{{ $student->motherLastNames }}" required autocomplete="apellidoMat" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="curp" class="col-form-label text-md-right">CURP</label>
                                    <input id="curp" type="text" class="form-control @error('curp') is-invalid @enderror" name="curp" 
                                    value="{{ $student->curp }}" required autocomplete="curp" autofocus>
                                </div>                                
                                <div class="form-group col-xs-4">
                                    <label for="school" class="col-form-label text-md-right">Escuela de procedencia</label>
                                    <select name="school" id="school" required class="form-control @error('school') is-invalid @enderror">
                                            @foreach($school as $items)
                                                @if($items->schoolOrigin_id == $student->schoolOrigin_id)
                                                    <option value="{{ $items->schoolOrigin_id }}" selected>{{ $items->schoolName }}</option>
                                                @else
                                                    <option value="{{ $items->schoolOrigin_id }}">{{ $items->schoolName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="matricula" class="col-form-label text-md-right">Matrícula</label>
                                    <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula"
                                    value="{{ $student->enrollment }}" required autocomplete="matricula" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="gender" class="col-form-label text-md-right">Género</label>
                                    <select name="gender" id="gender" required class="form-control @error('gender') is-invalid @enderror">
                                            @foreach($gender as $items)
                                                @if($items->gender_id == $student->gender_id)
                                                    <option value="{{ $items->gender_id }}" selected>{{ $items->name }}</option>
                                                @else
                                                    <option value="{{ $items->gender_id }}">{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="birthday" class="col-form-label text-md-right">Fecha de nacimiento</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>    
                                        <input id="birthday" type="text" class="form-control pull-right @error('birthday') isbirthday-invalid @enderror" name="birthday" value="{{$student->dateOfBirth}}" required autocomplete="birthday" autofocus>
                                    </div>
                                </div>                                
                                <div class="form-group col-xs-4">&nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="quarter" class="col-form-label text-md-right">Cuatrimestre</label>
                                    <select name="quarter" id="quarter" required class="form-control @error('quarter') is-invalid @enderror">
                                            @foreach($quarter as $items)
                                                @if($items->quarter_id == $student->quarter_id)
                                                    <option value="{{ $items->quarter_id }}" selected>{{ $items->quarterName }}</option>
                                                @else
                                                    <option value="{{ $items->quarter_id }}">{{ $items->quarterName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="group" class="col-form-label text-md-right">Grupo</label>
                                    <select name="group" id="group" required class="form-control @error('group') is-invalid @enderror">
                                            @foreach($group as $items)
                                                @if($items->group_id == $student->group_id)
                                                    <option value="{{ $items->group_id }}" selected>{{ $items->name }}</option>
                                                @else
                                                    <option value="{{ $items->group_id }}">{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="shift" class="col-form-label text-md-right">Turno</label>
                                    <select name="shift" id="shift" required class="form-control @error('shift') is-invalid @enderror">
                                            @foreach($shift as $items)
                                                @if($items->shift_id == $student->shift_id)
                                                    <option value="{{ $items->shift_id }}" selected>{{ $items->name }}</option>
                                                @else
                                                    <option value="{{ $items->shift_id }}">{{ $items->name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="nss" class="col-form-label text-md-right">Número de seguro social</label>
                                    <input id="nss" type="text" class="form-control @error('nss') is-invalid @enderror" name="nss"
                                    value="{{ $student->socialSecurityNumber }}" required autocomplete="nss" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="socialNumber" class="col-form-label text-md-right">Seguro contra accidentes</label>
                                    <input id="socialNumber" type="text" class="form-control @error('socialNumber') is-invalid @enderror" name="socialNumber"
                                    value="{{ $student->accidentInsurance }}" autocomplete="socialNumber" autofocus>
                                </div>                                
                                <div class="form-group col-xs-4">
                                    <label for="outTime" class="col-form-label text-md-right">Extemporaneo</label>
                                    <select name="outTime" id="outTime" required class="form-control @error(outTimep') is-invalid @enderror">
                                            @foreach($outTime as $items)
                                                @if($items["id"] == $student->outOfTime)
                                                    <option value="{{ $items['id'] }}" selected>{{ $items['id'] }}</option>
                                                @else
                                                    <option value="{{ $items['id'] }}">{{ $items['id'] }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>                             
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="degree" class="col-form-label text-md-right">Carrera</label>
                                    <select name="degree" id="degree" required class="form-control @error('degree') is-invalid @enderror">
                                            @foreach($degree as $items)
                                                @if($items->degree_id == $student->degree_id)
                                                    <option value="{{ $items->degree_id }}" selected>{{ $items->degreeName }}</option>
                                                @else
                                                    <option value="{{ $items->degree_id }}">{{ $items->degreeName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="gradoAcademico" class="col-form-label text-md-right">Grado académico</label>
                                    <select name="gradoAcademico" id="gradoAcademico" required class="form-control @error('gradoAcademico') is-invalid @enderror">
                                            @foreach($program as $items)
                                                @if($items->educativeProgram_id == $student->educativeProgram_id)
                                                    <option value="{{ $items->educativeProgram_id }}" selected>{{ $items->shortName }}</option>
                                                @else
                                                    <option value="{{ $items->educativeProgram_id }}">{{ $items->shortName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="correo" class="col-form-label text-md-right">Correo institucional</label>
                                    <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" id="correo2"
                                    value="{{ $student->institutionalEmail }}" required autocomplete="correo" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="incomeYear" class="col-form-label text-md-right">Año de ingreso</label>
                                    <input id="incomeYear" type="text" class="form-control @error('incomeYear') is-invalid @enderror" name="incomeYear" id="incomeYear2"
                                    value="{{ $student->incomeYear }}" required autocomplete="incomeYear" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="modality" class="col-form-label text-md-right">Modalidad</label>
                                    <select name="modality" id="modality" required class="form-control @error('modality') is-invalid @enderror">
                                            @foreach($modality as $items)
                                                @if($items->modality_id == $student->modality_id)
                                                    <option value="{{ $items->modality_id }}" selected>{{ $items->modalityName }}</option>
                                                @else
                                                    <option value="{{ $items->modality_id }}">{{ $items->modalityName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">&nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="telCelular" class="col-form-label text-md-right">Teléfono celular</label>
                                    <input id="telCelular" type="text" class="form-control @error('telCelular') is-invalid @enderror" name="telCelular" value="{{ $student->cellPhone }}" required autocomplete="telCelular" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="telOficina" class="col-form-label text-md-right">Teléfono oficina</label>
                                    <input id="telOficina" type="text" class="form-control @error('telOficina') is-invalid @enderror" name="telOficina" value="{{ $student->officePhone }}" required autocomplete="telOficina" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="correoPersonal" class="col-form-label text-md-right">Correo personal</label>
                                    <input id="correoPersonal" type="text" class="form-control @error('correoPersonal') is-invalid @enderror" name="correoPersonal" id="correPersonal2"
                                    value="{{ $student->personalEmail }}" required autocomplete="correoPersonal" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="facebook" class="col-form-label text-md-right">Red social facebook</label>
                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $student->facebook }}" required autocomplete="facebook" autofocus>
                                </div>
                                <div class="form-group col-xs-4">&nbsp;</div>
                                <div class="form-group col-xs-4">
                                    <label for="facebook" class="col-form-label text-md-right">Confirmar correo personal</label>
                                    <input id="correoPersonalConfirma" type="text" class="form-control @error(correoPersonalConfirma') is-invalid @enderror" name="correoPersonalConfirma" value="" required autocomplete=correoPersonalConfirma" autofocus>
                                </div>                                                                
                            </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box --> 
                          <div class="box box-success">
                            <div class="box-header with-border">
                              <h3 class="box-title">Información de estadía</h3>
                            </div>                                                      
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="enterprise" class="col-form-label text-md-right">Empresa</label>
                                    <select name="enterprise" id="enterprise" required class="form-control @error('enterprise') is-invalid @enderror">
                                            @foreach($enterprise as $items)
                                                @if($items->enterprise_id == $student->document->enterprise_id)
                                                    <option value="{{ $items->enterprise_id }}" selected>{{ $items->companyName }}</option>
                                                @else
                                                    <option value="{{ $items->enterprise_id }}">{{ $items->companyName }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                               
                                <div class="form-group col-xs-4">
                                    <label for="horas" class="col-form-label text-md-right">Horas a desempeñar</label>
                                    <input id="horas" type="text" class="form-control @error('horas') is-invalid @enderror" name="horas" value="{{$student->document->hoursStay}}" required autocomplete="horas"  autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="presentationDate" class="col-form-label text-md-right">Fecha carta de presentación</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>    
                                        <input id="presentationDate" type="text" class="form-control pull-right @error('presentationDate') is-invalid @enderror" name="presentationDate" value="{{$student->document->presentationDate}}" required autocomplete="rpresentationDate autofocus">
                                    </div>
                                </div>       
                                <div class="form-group col-xs-4">
                                    <label for="releaseDate" class="col-form-label text-md-right">Fecha carta de liberación</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>    
                                        <input id="releaseDate" type="text" class="form-control pull-right @error('releaseDate') is-invalid @enderror" name="releaseDate" value="{{$student->document->releaseDate}}" required autocomplete="releaseDate" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="project" class="col-form-label text-md-right">Introducir el nombre de su proyecto:</label>
                                    <textarea class="form-control @error('project') is-invalid @enderror" id="project" name="project" rows="2" autocomplete="project" autofocus>{{ $student->document->project }}</textarea>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label for="rectorName" class="col-form-label text-md-right">Nombre del rector de la universidad</label>
                                    <input id="rectorName" type="text" class="form-control @error('rectorName') is-invalid @enderror" name="rectorName" value="{{$student->document->nameRectorUniversity}}" required autocomplete="rectorName" autofocus>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="director" class="col-form-label text-md-right">Director(a) académico</label>
                                    <select name="director" id="director" required class="form-control @error('director') is-invalid @enderror">
                                            @foreach($director as $items)
                                                @if($items->academicDirector_id == $student->document->academicDirector_id)
                                                    <option value="{{ $items->academicDirector_id }}" selected>{{ $items->nameDirector }}</option>
                                                @else
                                                    <option value="{{ $items->academicDirector_id }}">{{ $items->nameDirector }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>                              
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4">
                                    <label for="advisor" class="col-form-label text-md-right">Asesor(a) académico</label>
                                    <select name="advisor" id="advisor" required class="form-control @error('advisor') is-invalid @enderror">
                                            @foreach($advisor as $items)
                                                @if($items->academicAdvisor_id == $student->document->academicAdvisor_id)
                                                    <option value="{{ $items->academicAdvisor_id }}" selected>{{ $items->nameAcademicAdvisor }}</option>
                                                @else
                                                    <option value="{{ $items->academicAdvisor_idd }}">{{ $items->nameAcademicAdvisor }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="editor" class="col-form-label text-md-right">Asesor(a) de estilo y redacción</label>
                                    <select name="editor" id="editor" required class="form-control @error('editor') is-invalid @enderror">
                                            @foreach($editor as $items)
                                                @if($items->editorialAdvisor_id == $student->document->editorialAdvisor_id)
                                                    <option value="{{ $items->editorialAdvisor_id }}" selected>{{ $items->nameEditorialAdvisor }}</option>
                                                @else
                                                    <option value="{{ $items->editorialAdvisor_id }}">{{ $items->nameEditorialAdvisor }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="link" class="col-form-label text-md-right">Responsable de vinculación</label>
                                    <select name="link" id="link" required class="form-control @error('link') is-invalid @enderror">
                                            @foreach($link as $items)
                                                @if($items->responsibleLinking_id == $student->responsibleLinking_id)
                                                    <option value="{{ $items->responsibleLinking_id }}" selected>{{ $items->nameResponsible }}</option>
                                                @else
                                                    <option value="{{ $items->responsibleLinking_id }}">{{ $items->nameResponsible }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->                                                                                                      
                            <div class="row">
                                 <div class="form-group"><center>
                                    <button type="submit" name="valida" id="valida2" class="btn btn-primary">Actualizar información</button>&nbsp;
                                    <a href="{{ route('students.index',['id'=>$student->period->period_id]) }}" class="btn btn-default">Cancelar</a>
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
@push('styles')


    <link rel="stylesheet" href="{{ asset("adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("adminlte/datatables.net-bs/css/dataTables.bootstrap.css") }}">

@endpush
@push('scripts')

    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("adminlte/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("adminlte/datatables.net-bs/js/dataTables.bootstrap.js") }}"></script>
@endpush

@push('jscustom')
<script type="text/javascript">
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

            if(confirm("¿ Desea modificar la información del alumno ?")){
               return true;
            }else{
                  return false;
            }

        });
    });

    $("#presentationDate").datepicker({
        language: 'es',
        format:'yyyy-mm-dd',
        autoclose: true
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#presentationDate').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#presentationDate').datepicker('setStartDate', null);
    });

     $("#releaseDate").datepicker({
        language: 'es',
        format:'yyyy-mm-dd',
        autoclose: true
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#releaseDate').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#releaseDate').datepicker('setStartDate', null);
    });

     $("#birthday").datepicker({
        language: 'es',
        format:'yyyy-mm-dd',
        autoclose: true
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#birthday').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#birthday').datepicker('setStartDate', null);
    });         
</script>
@endpush