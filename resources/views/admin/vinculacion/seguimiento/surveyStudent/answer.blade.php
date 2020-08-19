@extends('layouts.encuesta')

@section('content')
    <div class="container" style="margin-top: 100px">
        <h1>Encuestas ({{ $applySurvey->survey->period->name . " / " . date("Y", strtotime($applySurvey->survey->period->firstDay)) }})</h1>
        <div class="box box-success">
            <h2>{{ $applySurvey->survey->displayName }}</h2>
            <p>
                {!! $applySurvey->survey->description !!}
            </p>
            <br>
        </div>
                    <div class="callout callout-success">
                        <h4>Todos los datos y preguntas marcados con <span style="color: orange"> * </span> son de respuesta requerida</h4>
                    </div>

        <div class="box box-success">
            <h2> Datos del alumno </h2>
            <br>
            <strong>Nombre:</strong> {{ $applySurvey->student->name . " " . $applySurvey->student->lastName . " " . $applySurvey->student->motherLastname }}
            <br>
            <strong>Curp:</strong> {{ $applySurvey->student->curp  }}
            <br>
            <strong>Programa educativo:</strong> {{ $applySurvey->student->educativeProgram->displayName  }}
            <br>
            <strong>Matricula:</strong> {{ $applySurvey->student->enrollment  }}
            <br>
            <strong>Cuatrimestre:</strong> {{ $applySurvey->student->quarter->quarterName  }}
        </div>

        <form method="POST" action="{{ route('surveys.post_answer', [$applySurvey->id]) }}">
            @csrf

        @if($applySurvey->survey->validation)
                <div class="box box-success">
                    <h2> Datos de contacto </h2>
                    <br>
                    <div class="@if (count($errors)>0) has-error @endif">
                    @if (count($errors)>0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    </div>

                    <div class="form-group ">
                        <label for="personalEmail" class="col-form-label text-md-right">Correo Electrónico Personal <span style="color: orange">*</span></label>
                        <input id="personalEmail" type="email" class="form-control " name="personalEmail" value="{{ $applySurvey->student->personalEmail }}" autofocus>
                        @if (\Session::has('personalEmail'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('personalEmail') !!}</li>
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="homePhone" class="col-form-label text-md-right">Telefono de domicilio <span style="color: orange">*</span></label>
                        <input id="homePhone" type="text" class="form-control" name="homePhone" value="{{ $applySurvey->student->contact->homePhone }}">
                    </div>
                    <div class="form-group">
                        <label for="cellPhone" class="col-form-label text-md-right">Telefono celular <span style="color: orange">*</span></label>
                        <input id="cellPhone" type="text" class="form-control @error('cellPhone') has-error @enderror" name="cellPhone" value="{{ $applySurvey->student->cellPhone }}">
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-form-label text-md-right">Facebook <span style="color: orange">*</span></label>
                        <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $applySurvey->student->facebook  }}">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label text-md-right">Domicilio <span style="color: orange">*</span></label>
                        <textarea id="address" name="address" rows="2" class="form-control" >
                            {{ $applySurvey->student->contact->address }}
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="state_id" class="col-form-label text-md-right">Estado <span style="color: orange">*</span></label>
                            <select name = "state_id" class="form-control" >
                                <option value = 0>Seleccione el estado</option>
                                @foreach($states as $state)
                                    @if ($state->id == $applySurvey->student->contact->state_id)
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="township" class="col-form-label text-md-right">Municipio <span style="color: orange">*</span></label>
                            <input id="township" type="text" class="form-control @error('township') is-invalid @enderror" name="township" value="{{ $applySurvey->student->contact->township }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip_code" class="col-form-label text-md-right">Codigo postal <span style="color: orange">*</span></label>
                            <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ $applySurvey->student->contact->zip_code }}">
                        </div>
                    </div>
                </div>
                <div class="box box-success">
                    <h2> Familiar de referencia </h2>
                    <br>
                    <div class="form-group">
                        <label for="kinship_id" class="col-form-label text-md-right">Parentesco</label>
                        <select name = "kinship_id" class="form-control">
                            <option value = 0>Seleccione el parentesco</option>
                            @foreach($kinships as $kinship)
                                @if ($kinship->id == $applySurvey->student->contact->kinship_id)
                                    <option value="{{ $kinship->id }}" selected>{{ $kinship->name }}</option>
                                @else
                                    <option value="{{ $kinship->id }}">{{ $kinship->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name_family" class="col-form-label text-md-right">Nombre del familiar</label>
                        <input id="name_family" type="text" class="form-control @error('name_family') is-invalid @enderror" name="name_family" value="{{ $applySurvey->student->contact->name_family }}">
                    </div>

                    <div class="form-group">
                        <label for="homePhone_family" class="col-form-label text-md-right">Telefono de domicilio <span style="color: orange">*</span></label>
                        <input id="homePhone_family" type="text" class="form-control @error('homePhone_family') is-invalid @enderror" name="homePhone_family" value="{{ $applySurvey->student->contact->homePhone_family }}">
                    </div>
                    <div class="form-group">
                        <label for="cellPhone_family" class="col-form-label text-md-right">Telefono celular <span style="color: orange">*</span></label>
                        <input id="cellPhone_family" type="text" class="form-control @error('cellPhone_family') is-invalid @enderror" name="cellPhone_family" value="{{ $applySurvey->student->contact->cellPhone_family }}">
                    </div>
                    <div class="form-group">
                        <label for="email_family" class="col-form-label text-md-right">Correo electronico <span style="color: orange">*</span></label>
                        <input id="email_family" type="email" class="form-control @error('email_family') is-invalid @enderror" name="email_family" value="{{ $applySurvey->student->contact->email_family }}">
                    </div>
                </div>
                @endif
                @foreach($applySurvey->survey->questions as $question)
                    @if ($question->type_question == 1)
                        <div class="box box-success" style="margin-top: 10px" >
                            <div class="box-header">
                                <div class="row pregunta">
                                    <div class="col-sm-1">
                                        @if($question->required)
                                            <span style="color: orange; display: inline">*</span>
                                        @endif
                                        {{  $loop->index+1 . ". "}}
                                    </div>
                                    <div class="col-sm-10">{!! $question->content !!}</div>
                                </div>
                                @if (\Session::has("pregunta" . $question->id))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{!! \Session::get("pregunta" . $question->id) !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <p> {!! $question->complement !!}</p>
                            </div>
                            <div class="box-body">
                                <div class="form-group" style="inline-size: auto">
                                    @foreach($question->options as $option)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="iradio_square-green" id="defaultUnchecked" name="{{ "pregunta" . $question->id }}" value="{{ $option->id }}">
                                            <label class="custom-control-label" for="defaultUnchecked">{{ $option->content }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @elseif($question->type_question == 2)
                        <div class="box box-success" style="margin-top: 10px">
                            <div class="box-header">
                                <div class="row pregunta">
                                    <div class="col-sm-1">
                                        @if($question->required)
                                            <span style="color: orange; display: inline">*</span>
                                        @endif
                                        {{  $loop->index+1 . ". "}}
                                    </div>
                                    <div class="col-sm-10">{!! $question->content !!}</div>
                                </div>
                                @if (\Session::has("pregunta" . $question->id))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{!! \Session::get("pregunta" . $question->id) !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <p> {!! $question->complement !!}</p>
                            </div>
                            <div class="box-body">
                                <div class="form-group" style="inline-size: auto">
                                    @foreach($question->options as $option)
                                        <div class="custom-control custom-radio">
                                            <input type="checkbox" class="icheckbox_square-green" id="defaultUnchecked" name="{{ "pregunta" . $question->id . "[]" }}" value="{{ $option->id }}">
                                            <label class="custom-control-label" for="defaultUnchecked">{{ $option->content }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @elseif($question->type_question == 3)
                                <div class="box box-success" style="margin-top: 10px">
                                    <div class="box-header">
                                        <div class="row pregunta">
                                            <div class="col-sm-1">
                                                @if($question->required)
                                                    <span style="color: orange; display: inline">*</span>
                                                @endif
                                                {{  $loop->index+1 . ". "}}
                                            </div>
                                            <div class="col-sm-10">{!! $question->content !!}</div>
                                        </div>
                                        @if (\Session::has("pregunta" . $question->id))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{!! \Session::get("pregunta" . $question->id) !!}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        <p> {!! $question->complement !!}</p>
                                    </div>
                                    <div class="box-body">
                                        <textarea class="form-control" id="respuesta" name="{{ "pregunta" . $question->id }}" rows="3" cols="50">
                                        </textarea>
                                    </div>
                                </div>
                    @elseif($question->type_question == 4)
                                <div class="box box-success" style="margin-top: 10px">
                                    <div class="box-header">
                                        <div class="row pregunta">
                                            <div class="col-sm-1">
                                                @if($question->required)
                                                    <span style="color: orange; display: inline">*</span>
                                                @endif
                                                {{  $loop->index+1 . ". "}}
                                            </div>
                                            <div class="col-sm-10">{!! $question->content !!}</div>
                                        </div>
                                        @if (\Session::has("pregunta" . $question->id))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>{!! \Session::get("pregunta" . $question->id) !!}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        <p> {!! $question->complement !!}</p>
                                    </div>
                                    <div class="box-body">
                                        <input type="date" class="form-control" name="{{ "pregunta" . $question->id }}">
                                    </div>
                                </div>
                    @endif
                    @endforeach

                            <div class="form-group mb-0" style="margin-bottom: 100px">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar encuesta
                                    </button>
                                </div>
                            </div>
            </form>
    </div>


@stop

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
    <script>
        $(document).ready(function(){

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%' // optional
            });

            $('#personalEmail').change(function() {
                var m = document.getElementById("personalEmail").value;
                var expreg = new RegExp("^([a-z0-9_\\.-]+)@utchetumal\\.edu\\.mx$");

                if(expreg.test(m))
                    bootbox.alert("El correo electrónico personal no debe tener el dominio utchetumal.edu.mx");
            });

        });
    </script>
@endpush


