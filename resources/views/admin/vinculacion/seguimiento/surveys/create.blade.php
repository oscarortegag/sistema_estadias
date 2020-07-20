@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $period->displayName . " / " . date("Y", strtotime($period->year)) }})</h1>
@stop

<style>
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>


@section('content')

    <div class="container box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3>Nueva encuesta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            @if (count($errors)>0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <input name="period_id" type="hidden" value={{ $period->id }} id='period_id'>

                            <div class="form-group">
                                <label for="displayName" class="col-form-label text-md-right">Nombre</label>
                                <input id="displayName" type="text" class="form-control @error('displayName') is-invalid @enderror" name="displayName" value="{{ old('displayName') }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label text-md-right">Descripción</label>
                                <textarea id="description" name="description" rows="3" class="form-control">

                                </textarea>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row mb-2 mt-5">
                                        <div class="material-switch col-xs-1" style="margin-top: 10px">
                                            <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                            <label for="someSwitchOptionDefault" class="label-primary"></label>
                                        </div>
                                        <div class="col-xs-11">
                                            Validar datos de contacto?
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{route('surveys.index', ['id'=>$period->id])}}" class="btn btn-default">Regresar</a>
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
    <script src="/adminlte/ckeditor/ckeditor.js"></script>
    <script src="/js/admin/vinculacion/seguimiento/surveys/create.js"></script>
@endpush
