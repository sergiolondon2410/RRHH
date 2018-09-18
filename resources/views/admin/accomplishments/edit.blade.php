@extends('layout')

@section('title', $title)

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

	{!! Form::model($accomplishment, ['method' => 'POST', 'action' => ['AccomplishmentController@update', $accomplishment]])  !!}
	 	@method('PUT')
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{$accomplishment->award->name}}
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12">
												<p><strong>Otorgado a:</strong> {{ $accomplishment->user->name }} {{ $accomplishment->user->last_name }}</p>
											</div>
											<div class="col-sm-12">			
												<div class="form-group">
													{!! Form::label('observation', 'Observación') !!}
													{!! Form::textarea('observation', null, ['class' => 'form-control', 'value' => old('observation')]) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<img src="{{ asset('/storage') }}/{{$accomplishment->award->resource->uri}}" height="170em">
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Editar reconocimiento', ['class' => 'form-control btn btn-default']) !!}
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

	<a class="btn btn-default" href="{{ route('accomplishments.show', ['accomplishment' => $accomplishment]) }}">Cancelar</a>

@endsection