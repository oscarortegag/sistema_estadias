
@extends('layouts.master')

@section('header')
    <h1>Estadísticas ({{ $period->displayName }})</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $students[0]->total }}</h3>

                    <p>Alumnos registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('students.index', ['id'=>$period->id])}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $polls[0]->total }}</h3>

                    <p>Encuestas registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('polls.index', ['id'=>$period->id])}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop


