@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $period->name . " / " . date("Y", strtotime($period->firstDay)) }})</h1>
@stop

@section('content')
    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Copiar encuesta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route("surveys.post_duplicate") }}">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <input name="period_id" type="hidden" value={{ $period->period_id }} id='period_id'>

                            <div class="form-group">
                                <label for="previous_period_id" class= "col-form-label">
                                    Periodo anterior
                                </label>
                                <select name = "previous_period_id" class="form-control" id="previous_period_id">
                                    <option value = ''>Seleccione el periodo anterior</option>
                                    @foreach($periods as $previous_period)
                                        <option value="{{ $previous_period->period_id }}">{{$previous_period->name . " / " . date("Y", strtotime($previous_period->firstDay))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="previous_survey_id" class="col-form-label">
                                    Encuesta anterior
                                </label>
                                <select name = "previous_survey_id" class="form-control" id="previous_survey_id">
                                    <option value = ''>Seleccione la encuesta anterior</option>
                                    <option>Debe selecionar el periodo primero</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Copiar
                                    </button>
                                    <a href="{{route('surveys.index', ['id'=>$period->period_id])}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#previous_period_id').change(function () {
                $.get("{{ url('dropdown')}}",
                    {option: $(this).val()},
                    function (data) {
                        $('#previous_survey_id').empty();
                        $('#previous_survey_id').append("option value=''>Seleccione la encuesta</option>")
                        $.each(data, function (key, element) {
                            $('#previous_survey_id').append("<option value='" + key + "'>" + element + "</option>");
                        });
                    });
            });
        });

    </script>
@endpush
