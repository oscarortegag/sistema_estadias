@extends('layouts.encuesta')

@section('content')
    <!-- iCheck -->
    <div class="col-md-offset-3 col-md-6">
        <div class="box box-success" style="margin-top: 100px">
            <div class="box-header">
                <h2 class="box-title">Pregunta con una respuesta</h2>
            </div>
            <div class="box-body">
                <!-- radio -->
                <div class="form-group" style="inline-size: auto">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="iradio_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="iradio_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 2</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="iradio_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 3</label>
                    </div>
                </div>
                <div class="box-footer">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Anterior</a></li>
                        <li class="next"><a href="#">Siguiente &rarr;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-offset-3 col-md-6">
        <div class="box box-success" style="margin-top: 100px">
            <div class="box-header">
                <h2 class="box-title">Pregunta con varias respuesta</h2>
            </div>
            <div class="box-body">
                <!-- radio -->
                <div class="form-group" style="inline-size: auto">
                    <div class="custom-control custom-radio">
                        <input type="checkbox" class="icheckbox_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="checkbox" class="icheckbox_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 2</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="checkbox" class="icheckbox_square-green" id="defaultUnchecked" name="defaultExampleRadios">
                        <label class="custom-control-label" for="defaultUnchecked">Opcion 3</label>
                    </div>
                </div>
                <div class="box-footer">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Anterior</a></li>
                        <li class="next"><a href="#">Siguiente &rarr;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-offset-3 col-md-6">
        <div class="box box-success" style="margin-top: 100px">
            <div class="box-header">
                <h2 class="box-title">Pregunta con respuesta abierta</h2>
            </div>
            <div class="box-body">
                <input type="text" class="form-control" name="respuesta">
            </div>
            <div class="box-footer">
                <ul class="pager">
                    <li class="previous"><a href="#">&larr; Anterior</a></li>
                    <li class="next"><a href="#">Siguiente &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>


@stop

