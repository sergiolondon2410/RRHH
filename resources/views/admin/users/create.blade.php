@extends('layout')

@section('title', "Crear Usuario")

@section('content')
	
	@if($errors->any())
		<div class="alert alert-danger">
			<h4>El formulario tiene los siguientes errores</h4>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(['url' => route('users.store'), 'method' => 'POST', 'files' => true])  !!}
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Información del usuario
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('name', '*Nombre') !!}
									{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('last_name', '*Apellidos') !!}
									{!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name')]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('document', '*Documento') !!}
									{!! Form::text('document', null, ['class' => 'form-control', 'value' => old('document')]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('user_type', '*Tipo de usuario') !!}
									{!! Form::select('user_type', $user_type, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('email', '*Email') !!}
									{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'usuario@email.com', 'value' => old('email') ]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('organization', '*Empresa') !!}
									{!! Form::select('organization', $organization, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('position', 'Cargo') !!}
									{!! Form::text('position', null, ['class' => 'form-control', 'value' => old('position')]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('area', 'Área') !!}
									{!! Form::text('area', null, ['class' => 'form-control', 'value' => old('area')]) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('password', '*Contraseña') !!}
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{!! Form::label('password_confirm', '*Confirme la contraseña') !!}
									{!! Form::password('password_confirm', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-6">
								{!! Form::label('profile_img', 'Sube una foto de perfil:') !!}
								{!! Form::file('profile_img', null, ['class' => 'filestyle']) !!}
							</div>
							<div class="col-sm-12">
								<div class="form-group" style="margin-top: 20px">
									{!! Form::submit('Crear Usuario', ['class' => 'form-control btn btn-default']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.panel -->
			</div>
		</div>
	{!! Form::close() !!}
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('users.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection