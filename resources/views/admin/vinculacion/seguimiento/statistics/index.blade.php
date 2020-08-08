
@extends('layouts.master')

@section('header')
    <h1>Estadísticas ({{ $period->name . " / " . date("Y", strtotime($period->firstDay)) }})</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $period->students->count() }} <p style="display:inline">Alumnos registrados</p>                    </h3>

                    <h4>{{ $period->students->where('gender_id', 1)->count() }} <p style="display: inline">Hombres</p></h4>
                    <h4>{{ $period->students->where('gender_id', 2)->count() }} <p style="display: inline">Mujeres</p></h4>

                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('students.index', ['id'=>$period->id])}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

            <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $period->surveys->count() }} <p style="display: inline">Encuestas registradas</p></h3>
                    @foreach($period->surveys as $survey)
                        <p>{{$survey->displayName}}    {{ $survey->applySurveys->where('status', 1)->count() ? (($survey->applySurveys->where('status', 1)->count() / $survey->applySurveys->count()) * 100) : 0}} % </p>
                    @endforeach
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{route('surveys.index', ['id'=>$period->id])}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        </div>


        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Alumnos por especialidad</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="fa fa-circle-o text-red"></i> TSU TI</li>
                            <li><i class="fa fa-circle-o text-green"></i> ING TI</li>
                            <li><i class="fa fa-circle-o text-yellow"></i> TSU MECATRÓNICA</li>
                            <li><i class="fa fa-circle-o text-aqua"></i> ING MECATRÓNICA</li>
                            <li><i class="fa fa-circle-o text-light-blue"></i> TSU GASTRONOMÍA</li>
                            <li><i class="fa fa-circle-o text-gray"></i> ING GASTRONOMÍA</li>
                            <li><i class="fa fa-circle-o text-orange"></i> TSU MERCADOTECNIA</li>
                            <li><i class="fa fa-circle-o text-purple"></i> ING MERCADOTECNIA</li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @foreach($period->surveys as $survey)
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $survey->displayName }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($survey->questions as $question)
                            <div class="col-md-10 col-md-offset-1">
                                <h4>{!!  $question->content !!}</h4>
                                @if($question->type_question == 1 OR $question->type_question == 2)
                                <table>
                                    <thead>
                                        <th>Opción</th>
                                        <th>Cantidad</th>
                                    </thead>
                                    <tbody>
                                        @foreach($question->options as $option)
                                            <tr>
                                                <td>
                                                    {{$option->content}}
                                                </td>
                                                <td>
                                                    {{$option->respuestas->count() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <table>
                                        <thead>
                                            <th>Respuestas</th>
                                        </thead>
                                        <tbody>
                                            @foreach($question->respuestas as $respuesta)
                                                <td>
                                                    {{$respuesta->reponse_string}}
                                                </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>

        @endforeach
    </div>
@stop

@push('scripts')
    <script src="/adminlte/chart.js/Chart.js"></script>
    <script src="/js/admin/vinculacion/seguimiento/statistics/index.js"></script>
@endpush



