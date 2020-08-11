
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
                        <p>{{strlen($survey->displayName) > 60?substr($survey->displayName,0,60) . "...":substr($survey->displayName,0,60)}}    {{ $survey->applySurveys->where('status', 1)->count() ? (($survey->applySurveys->where('status', 1)->count() / $survey->applySurveys->count()) * 100) : 0}} % </p>
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
                <h3 class="box-title">Alumnos por programa educativo</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <table  class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Programa Educativo</th>
                                <th>Hombres</th>
                                <th>Mujeres</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educativePrograms as $educativeProgram)
                                @if($educativeProgram->students->count()>0)
                                    <tr>
                                        <td><i class="fa fa-circle-o {{$educativeProgram->color->name}}"></i>  {{$educativeProgram->displayName}}</td>
                                        <td>{{$educativeProgram->students->where('gender_id',1)->count()  }}</td>
                                        <td>{{$educativeProgram->students->where('gender_id',2)->count()  }}</td>
                                        <td>{{$educativeProgram->students->count()  }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Alumnos por edades</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table  class="table table-responsive table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Programa Educativo</th>
                                <th>18 a 20</th>
                                <th>21 a 22</th>
                                <th>23 a 24</th>
                                <th>25 a 26</th>
                                <th>27 a 28</th>
                                <th>29 a 30</th>
                                <th>Mayor de 30</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educativePrograms as $educativeProgram)
                                @if($educativeProgram->students->count()>0)
                                    <tr>
                                        <td><i class="fa fa-circle-o {{$educativeProgram->color->name}}"></i>  {{$educativeProgram->displayName}}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [18, 20])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [21, 22])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [23, 24])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [25, 26])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [28, 29])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->whereBetween('edad', [29, 30])->count()  }}</td>
                                        <td>{{$studentByAge->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->where('edad', '>', 30)->count()  }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.box-body -->
        </div>

        @foreach($period->surveys as $survey)
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $survey->displayName }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($survey->questions as $question)
                            <div class="col-md-10 col-md-offset-1">
                                <h4>{!!  $question->content !!}</h4>
                                @if($question->type_question == 1 OR $question->type_question == 2)
                                <table class="table table-responsive table-hover table-striped">
                                    <thead>
                                        <th>Opción</th>
                                        @foreach($educativePrograms as $educativeProgram)
                                            @if($educativeProgram->students->count()>0)
                                                <th>
                                                    <i class="fa fa-circle-o {{$educativeProgram->color->name}}"></i>
                                                    {{$educativeProgram->shortName}}
                                                </th>
                                            @endif
                                        @endforeach

                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @foreach($question->options as $option)
                                            <tr>
                                                <td>
                                                    {{$option->content}}
                                                </td>
                                                @foreach($educativePrograms as $educativeProgram)
                                                    @if($educativeProgram->students->count()>0)
                                                    <td>
                                                        {{$responses->where('educativeProgram_id', $educativeProgram->educativeProgram_id)->where('question_id', $question->id)->where('option_id', $option->id)->count()}}
                                                    </td>
                                                    @endif
                                                @endforeach
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
                                                <tr>
                                                <td>
                                                    {{$respuesta->response_string}}
                                                </td>
                                                </tr>
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
    <script>
        $(document).ready(function() {

            $.ajax({
                // la URL para la petición
                url : "{{ route('statistics.studentByEducativeProgram',['id'=>$period->period_id])}}",

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                //data : { id : 123 },

                // especifica si será una petición POST o GET
                type : 'GET',

                // el tipo de información que se espera de respuesta
                dataType : 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success : function(json) {
                    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                    var pieChart = new Chart(pieChartCanvas);
                    var pieOptions = {
                        // Boolean - Whether we should show a stroke on each segment
                        segmentShowStroke: true,
                        // String - The colour of each segment stroke
                        segmentStrokeColor: '#fff',
                        // Number - The width of each segment stroke
                        segmentStrokeWidth: 1,
                        // Number - The percentage of the chart that we cut out of the middle
                        percentageInnerCutout: 50, // This is 0 for Pie charts
                        // Number - Amount of animation steps
                        animationSteps: 100,
                        // String - Animation easing effect
                        animationEasing: 'easeOutBounce',
                        // Boolean - Whether we animate the rotation of the Doughnut
                        animateRotate: true,
                        // Boolean - Whether we animate scaling the Doughnut from the centre
                        animateScale: false,
                        // Boolean - whether to make the chart responsive to window resizing
                        responsive: true,
                        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio: false,
                        // String - A legend template
                        legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
                        // String - A tooltip template
                        tooltipTemplate: '<%=value %> <%=label%> users'
                    };

                    console.log(json);

                    pieChart.Doughnut(json, pieOptions);

                },

                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto de la petición en crudo y código de estatus de la petición
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });




           /*$.get("",
                function (data) {
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

            var pieChart = new Chart(pieChartCanvas);
                    var PieData = [
                        {
                            value: 700,
                            color: '#f56954',
                            highlight: '#f56954',
                            label: 'TSU TI'
                        },
                        {
                            value: 500,
                            color: '#00a65a',
                            highlight: '#00a65a',
                            label: 'ING TI'
                        },
                        {
                            value: 400,
                            color: '#f39c12',
                            highlight: '#f39c12',
                            label: 'TSU MECATRÓNICA'
                        },
                        {
                            value: 600,
                            color: '#00c0ef',
                            highlight: '#00c0ef',
                            label: 'ING MECATRÓNICA'
                        },
                        {
                            value: 300,
                            color: '#3c8dbc',
                            highlight: '#3c8dbc',
                            label: 'TSU GASTRONOMÍA'
                        },
                        {
                            value: 100,
                            color: '#d2d6de',
                            highlight: '#d2d6de',
                            label: 'ING GASTRONOMÍA'
                        },
                        {
                            value: 50,
                            color: '#ff851b',
                            highlight: '#ff851b',
                            label: 'TSU DISEÑO DE NEGOCIOS'
                        },
                        {
                            value: 30,
                            color: '#f012be',
                            highlight: '#f012be',
                            label: 'ING DISEÑO DE NEGOCIOS'
                        }
                    ];
                    var pieOptions = {
                        // Boolean - Whether we should show a stroke on each segment
                        segmentShowStroke: true,
                        // String - The colour of each segment stroke
                        segmentStrokeColor: '#fff',
                        // Number - The width of each segment stroke
                        segmentStrokeWidth: 1,
                        // Number - The percentage of the chart that we cut out of the middle
                        percentageInnerCutout: 50, // This is 0 for Pie charts
                        // Number - Amount of animation steps
                        animationSteps: 100,
                        // String - Animation easing effect
                        animationEasing: 'easeOutBounce',
                        // Boolean - Whether we animate the rotation of the Doughnut
                        animateRotate: true,
                        // Boolean - Whether we animate scaling the Doughnut from the centre
                        animateScale: false,
                        // Boolean - whether to make the chart responsive to window resizing
                        responsive: true,
                        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio: false,
                        // String - A legend template
                        legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
                        // String - A tooltip template
                        tooltipTemplate: '<%=value %> <%=label%> users'
                    };
            console.log(data);
            console.log(PieData);
                    pieChart.Doughnut(data, pieOptions);








                    /*var PieData = {
                        data: {
                            datasets: [{
                                data: data['data'],//esta es la data, podemos pasarle variables directamente desde el backend usando blade de la siguiente forma ,
                                backgroundColor: data['colors'],
                            }],
                            labels: data['labels']
                        },
                        options: {//le pasamos como opcion adicional que sea responsivo
                            responsive: true,
                        }
                    }*/
                        /*            var PieData = [
                                        {
                                            value: 700,
                                            color: '#f56954',
                                            highlight: '#f56954',
                                            label: 'TSU TI'
                                        },
                                        {
                                            value: 500,
                                            color: '#00a65a',
                                            highlight: '#00a65a',
                                            label: 'ING TI'
                                        },
                                        {
                                            value: 400,
                                            color: '#f39c12',
                                            highlight: '#f39c12',
                                            label: 'TSU MECATRÓNICA'
                                        },
                                        {
                                            value: 600,
                                            color: '#00c0ef',
                                            highlight: '#00c0ef',
                                            label: 'ING MECATRÓNICA'
                                        },
                                        {
                                            value: 300,
                                            color: '#3c8dbc',
                                            highlight: '#3c8dbc',
                                            label: 'TSU GASTRONOMÍA'
                                        },
                                        {
                                            value: 100,
                                            color: '#d2d6de',
                                            highlight: '#d2d6de',
                                            label: 'ING GASTRONOMÍA'
                                        },
                                        {
                                            value: 50,
                                            color: '#ff851b',
                                            highlight: '#ff851b',
                                            label: 'TSU DISEÑO DE NEGOCIOS'
                                        },
                                        {
                                            value: 30,
                                            color: '#f012be',
                                            highlight: '#f012be',
                                            label: 'ING DISEÑO DE NEGOCIOS'
                                        }
                                    ];*/
              /*          var pieOptions = {
                            // Boolean - Whether we should show a stroke on each segment
                            segmentShowStroke: true,
                            // String - The colour of each segment stroke
                            segmentStrokeColor: '#fff',
                            // Number - The width of each segment stroke
                            segmentStrokeWidth: 1,
                            // Number - The percentage of the chart that we cut out of the middle
                            percentageInnerCutout: 50, // This is 0 for Pie charts
                            // Number - Amount of animation steps
                            animationSteps: 100,
                            // String - Animation easing effect
                            animationEasing: 'easeOutBounce',
                            // Boolean - Whether we animate the rotation of the Doughnut
                            animateRotate: true,
                            // Boolean - Whether we animate scaling the Doughnut from the centre
                            animateScale: false,
                            // Boolean - whether to make the chart responsive to window resizing
                            responsive: true,
                            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                            maintainAspectRatio: false,
                            // String - A legend template
                            legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
                            // String - A tooltip template
                            tooltipTemplate: '<%=value %> <%=label%> users'
                        };
// Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
                        pieChart.Doughnut(data, pieOptions);
// -----------------
// - END PIE CHART -

                        /*var oilCanvas = document.getElementById("pieChart").getContext("2d");

                        Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;

                        var oilData = {
                            labels: [
                                "Saudi Arabia",
                                "Russia",
                                "Iraq",
                                "United Arab Emirates",
                                "Canada"
                            ],
                            datasets: [
                                {
                                    data: [133.3, 86.2, 52.2, 51.2, 50.2],
                                    backgroundColor: [
                                        "#FF6384",
                                        "#63FF84",
                                        "#84FF63",
                                        "#8463FF",
                                        "#6384FF"
                                    ]
                                }]
                        };

                        var pieChart = new Chart(oilCanvas, {
                            type: 'pie',
                            data: oilData
                        });
            */

             //       });

        });
    </script>
@endpush



