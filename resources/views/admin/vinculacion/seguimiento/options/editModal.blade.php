@extends('layouts.baseModal')

@section('modalTitle')
	Editar Opción
@endsection

@section('modalBody')
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <form  method="POST" action="{{ route('options.update', $option->id) }}" id='form-editModal'>
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for = "content" class="col-form-label text-md-right">
                            Opción
                        </label>
                        <input id="content" type="text" class="form-control @error('name') is-invalid @enderror" name="content" value="{{ $option->content }}" required autocomplete="content" autofocus>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('modalFooter')
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="button" class="btn btn-primary" id="btn-editar-opcion">Guardar</button>
		</div>
	</div>
@endsection

@section('modalScripts')
	@parent
    <script src="/js/admin/vinculacion/seguimiento/options/editModal.js"></script>
@endsection









