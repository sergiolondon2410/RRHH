@extends('layout')

@section('title', "Responder Evaluación")

@section('content')
	<div class="row">
			<div class="col-sm-12">	
				<h2>{{ $implementation->evaluation->name }}</h2>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading">
				  		<h3 class="panel-title">Datos de identificación</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<p><strong>Nombre</strong></p>
							</div>
							<div class="col-sm-6">
								<p>{{ $user->name }} {{ $user->last_name }}</p>
							</div>
							<div class="col-sm-6">
								<p><strong>Cargo</strong></p>
							</div>
							<div class="col-sm-6">
								<p>{{ $user->position }}</p>
							</div>
							<div class="col-sm-6">
								<p><strong>Fecha de ingreso</strong></p>
							</div>
							<div class="col-sm-6">
								<p>{{ $user->date_in }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	{!! Form::open(['url' => '/aplicacion/crear', 'method' => 'POST', 'files' => true])  !!}
		{!! Form::hidden('implementation_id', $implementation->id) !!}
		<div class="row">
			<div class="col-sm-6">	
				<div class="form-group" style="margin-top: 20px">
						{!! Form::submit('Comenzar Evaluación', ['class' => 'form-control btn btn-primary']) !!}
				</div>
			</div>
		</div>
		

	{!! Form::close() !!}

@endsection