@extends('layouts.base')

@section('title', 'Usuarios')

@section('page-header')
    <h1>Usuario
        <small>cambiar contraseña</small>
    </h1>
@stop

@section('content')

	<!-- Mensajes de Validate -->
	<div class="row">
		<div class="col-md-12">
			@if ($errors->any())
				<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Revise los siguientes campos.
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Cambiar contraseña</h3>
		</div>

        <form  method="POST" action="{{ route('usuarios.password_update') }}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}

		<div class="card-body">
			<div class="form-group">
                <label for="current_password" class="col-form-label">Contraseña actual</label>
                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
			</div>
            <div class="form-group">
                <label for="password" class="col-form-label">Nueva contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-form-label">Confirmar contraseña</label>
                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required>
                @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

		</div>
		<div class="card-footer">
			<button class="btn btn-success">Guardar</button>
            <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
		</div>
        </form>
	</div>
@stop()
