
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
                    <h3>{{ $surveys[0]->total }}</h3>

                    <p>Encuestas registradas</p>
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
    </div>
@stop

@push('scripts')
    <script src="/adminlte/chart.js/Chart.js"></script>
    <script src="/js/admin/vinculacion/seguimiento/statistics/index.js"></script>
@endpush



