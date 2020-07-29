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
        <div class="box box-success">
            <h2> Datos del alumno </h2>
            <br>
            <strong>Nombre:</strong> {{ $applySurvey->student->name . $applySurvey->student->lastName . " " . $applySurvey->student->motherLastnames  }}
            <br>
            <strong>Curp:</strong> {{ $applySurvey->student->curp  }}
            <br>
            <strong>Programa educativo:</strong> {{ $applySurvey->student->educativeProgram->displayName  }}
            <br>
            <strong>Matricula:</strong> {{ $applySurvey->student->enrollment  }}
            <br>
            <strong>Cuatrimestre:</strong> {{ $applySurvey->student->quarter->quarterName  }}
        </div>


            @foreach($messages as $message)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <p>
                        {{$message}}
                    </p>
                </div>
            @endforeach

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type = "submit" class="btn btn-success">Finalizar</button>
                </form>

    </div>

@stop

