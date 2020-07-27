@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $period->name . " / " . date("Y", strtotime($period->firstDay)) }})</h1>
    <h1>{{ $survey->displayName }}</h1>
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
                        <h3>Editar una pregunta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.update', [$question->id]) }}">
                            {!! method_field('PUT') !!}
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
                                <label for="name" class="col-form-label text-md-right">Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  $question->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="type_question" class="col-form-label text-md-right">Tipo de pregunta</label>
                                <select name = "type_question" class="form-control">
                                    <option value = 0>Seleccione el tipo de pregunta</option>
                                    <option value= "1"  {{ $question->type_question == '1'? 'selected' : ''}} >Pregunta con una respuesta con opciones </option>
                                    <option value= "2"  {{ $question->type_question == '2'? 'selected' : ''}}>Pregunta con varias respuestas con opciones </option>
                                    <option value= "3"  {{ $question->type_question == '3'? 'selected' : ''}}>Pregunta con respuesta abierta</option>
                                    <option value= "4" {{ $question->type_question == '4'? 'selected' : ''}}>Pregunta con respuesta tipo fecha</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content" class="col-form-label text-md-right">Pregunta</label>
                                <textarea id="content" name="content" rows="3" class="form-control">
                                    {{ $question->content }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="complement" class="col-form-label text-md-right">Complemento de pregunta</label>
                                <textarea id="complement" name="complement" rows="3" class="form-control">
                                    {{ $question->complement }}
                                </textarea>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row mb-2 mt-5">
                                        <div class="material-switch col-xs-1" style="margin-top: 10px">
                                            @if ($question->required)
                                                <input id="required" name="required" type="checkbox" checked />
                                            @else
                                                <input id="required" name="required" type="checkbox" />
                                            @endif

                                            <label for="required" class="label-primary"></label>
                                        </div>
                                        <div class="col-xs-11">
                                            Respuesta requerida?
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{route('surveys.edit', ['id'=>$survey->id])}}" class="btn btn-default">Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @if ($question->type_question == 1 or $question->type_question == 2)
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header"> <h3>opciones</h3></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('options.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="survey_question_id" type="hidden" value={{ $question->id }} id='survey_question_id'>
                                            <input type="text" class="form-control" name="content" aria-label="...">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-success">
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table id="tabla-encuestas" class="table table-responsive table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="80%">Nombre</th>
                                        <th width="20%">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($question->options as $option)
                                        <tr>
                                            <td>{{ $option->content }} </td>
                                            <td>
                                                <a href="javascript:abre_modal('{{ $option->id }}')" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar datos de una opción">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form style="display: inline" method="POST" action="{{ route("options.destroy", [$option->id]) }}">
                                                    {!! method_field('DELETE') !!}
                                                    {!! csrf_field() !!}

                                                    <button type = "submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar opción"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <p> No existen opciones de la pregunta </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/routes/routes.js') }}"></script>
    <script src="{{ asset('js/SEQ.Utilities.js') }}"></script>
    <script src="{{ asset('js/admin/vinculacion/seguimiento/questions/edit.js') }}"></script>
@endpush
