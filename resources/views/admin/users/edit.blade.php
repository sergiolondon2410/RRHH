@extends('layout')

@section('title', "Editar Usuario")

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

	{!! Form::model($user, ['method' => 'POST', 'action' => ['UserController@update', $user],  'files' => true])  !!}
	 	<!-- <input type="hidden" name="_method" value="PUT"> -->
	 	@method('PUT')
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        Información del usuario: {{ $user->name }}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('name', 'Nombre') !!}
											{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
										</div>
									</div>
									<div class="col-sm-6">			
										<div class="form-group">
											{!! Form::label('last_name', 'Apellidos') !!}
											{!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name')]) !!}
										</div>
									</div>
									<div class="col-sm-6">			
										<div class="form-group">
											{!! Form::label('document', 'Documento') !!}
											{!! Form::text('document', null, ['class' => 'form-control', 'value' => old('document')]) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('user_type', 'Tipo de usuario') !!}
											{!! Form::select('user_type', $user_type, $user->user_type_id, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('email', 'Email') !!}
											{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'usuario@email.com', 'value' => old('email') ]) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('organization', 'Empresa') !!}
											{!! Form::select('organization', $organization, $user->organization_id, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-sm-12">
										<hr>
										<p><i>*ingrese valores en los siguientes campos solo si desea modificarlos</i></p>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('password', 'Contraseña') !!}
											{!! Form::password('password', ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('password_confirm', 'Confirme la contraseña') !!}
											{!! Form::password('password_confirm', ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-sm-6">
                                    	{!! Form::label('profile_img', 'Sube una foto de perfil:') !!}
				                        {!! Form::file('profile_img', null, ['class' => 'filestyle']) !!}
				                    </div>
				                    <div class="col-sm-6">
                                    	<img src="{{ asset('/storage') }}/{{$user->profile_img}}" height="100em">
				                    </div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Editar Usuario', ['class' => 'form-control btn btn-default']) !!}
								</div>
							</div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
				</div>
                <!-- /.panel -->
			</div>
		</div>
		

	{!! Form::close() !!}

	<p><a href="{{ url("/usuarios/$user->id")}}">Volver al perfil de usuario</a></p>

@endsection