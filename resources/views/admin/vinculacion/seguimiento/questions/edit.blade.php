@extends('layouts.master')

@section('header')
    <h1>Encuestas ({{ $period->displayName . " / " . date("Y", strtotime($period->year)) }})</h1>
    <h2>{{$survey->diplayName}}</h2>
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
                                    <option value= "1"  {{ $question->type_question = '1'? 'selected' : ''}} >Pregunta con una respuesta con opciones </option>
                                    <option value= "2"  {{ $question->type_question = '2'? 'selected' : ''}}>Pregunta con varias respuestas con opciones </option>
                                    <option value= "3"  {{ $question->type_question = '3'? 'selected' : ''}}>Pregunta con respuesta abierta</option>
                                    <option value= "4" {{ $question->type_question = '4'? 'selected' : ''}}>Pregunta con respuesta tipo fecha</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content" class="col-form-label text-md-right">Pregunta</label>
                                <textarea id="content" name="content" rows="3" class="form-control">
                                    {{ $question->content }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="complemento" class="col-form-label text-md-right">Complemento de pregunta</label>
                                <textarea id="complemento" name="complemento" rows="3" class="form-control">
                                    {{ $question->complemento }}
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
                                            Pregunta requerida?
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/adminlte/ckeditor/ckeditor.js"></script>
    <script src="/js/admin/vinculacion/seguimiento/questions/create.js"></script>
@endpush
