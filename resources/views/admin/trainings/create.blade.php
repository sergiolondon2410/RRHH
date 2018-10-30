@extends('layout')

@section('title', "Nuevo requerimiento de Capacitación")

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

	{!! Form::open(['url' => route('trainings.store', ['user' => $user, 'evaluation' => $evaluation]), 'method' => 'POST'])  !!}
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Crear requerimiento de capacitación para {{ $user->full_name }}
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('observation', 'Requerimiento de capacitación:') !!}
									{!! Form::textarea('observation', null, ['class' => 'form-control', 'rows' => 4, 'value' => old('observation')]) !!}
								</div>
							</div>
							<div class="form-group col-sm-12">
								{!! Form::submit('Crear requerimiento de capacitación', ['class' => 'form-control btn btn-default']) !!}
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
			</div>
		</div>
	{!! Form::close() !!}

	<p><a class="btn btn-default" href="{{ route('applications.usercomputation', ['user' => $user, 'evaluation' => $evaluation]) }}"> <i class="fa fa-times"></i> Cancelar</a></p>
	<hr>

@endsection