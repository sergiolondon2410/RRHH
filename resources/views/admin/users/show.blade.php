@extends('layout')

@section('title', "Detalle Usuario: {$user->name}")

@section('content')

	<div class="row">
	        <div class="col-lg-9">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	{{ $user->name }} {{ $user->last_name }}
	            	</div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                	<div class="row">
	                		<div class="col-lg-6">
								<p><strong>Correo:</strong> {{ $user->email }}</p>
								<p><strong>Documento:</strong> {{ $user->document }}</p>
								<p><strong>Empresa:</strong> {{ $user->organization->name }}</p>
								<p><strong>Tipo de usuario:</strong> {{ $user->user_type->name }}</p>
							</div>
							<div class="col-lg-4">
								<img src="{{ asset('/storage') }}/{{$user->profile_img}}" height="100em">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<a class="btn btn-default" href="{{ url("/usuarios/editar/$user->id")}}"> <i class="fa fa-pencil"></i> Editar</a>
							</div>	
							<div class="col-lg-2">
								{!! Form::model($user, ['method' => 'POST', 'action' => ['UserController@destroy', $user->id],  'files' => true]) !!}
									@method('DELETE')
									<input type="submit" class="btn btn-danger" value="Eliminar" onclick="return confirm('Está seguro de eliminar al usuario {{ $user->name }} {{ $user->last_name }}? ')">
								{!! Form::close() !!}
							</div>
						</div>
	                </div>
	                <!-- /.panel-body -->
	            </div>
	            <!-- /.panel -->
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>
	<p><a href="{{ url("/usuarios")}}">Volver al listado</a></p>
	<p><a ></a></p>

@endsection