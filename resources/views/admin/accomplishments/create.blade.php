@extends('layout')

@section('title', "Otorgar Reconocimiento")

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

	{!! Form::open(['url' => route('accomplishments.store'), 'method' => 'POST', 'files' => true])  !!}
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Información
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													{!! Form::label('user', 'Otorgar a') !!}
													{!! Form::select('user', $users, null, ['class' => 'form-control']) !!}
												</div>
											</div>
											<div class="col-sm-12">			
												<div class="form-group">
													{!! Form::label('observation', 'Observacion') !!}
													{!! Form::textarea('observation', null, ['class' => 'form-control', 'value' => old('observation')]) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12">
												{!! Form::label('award', 'Reconocimiento') !!}
											</div>
											@foreach($awards as $award)
												<div class="col-sm-6">			
													<div class="form-group">
													<label><input type="radio" value="{{ $award->id }}" name="award"> <img src="{{ asset('/storage') }}{{ $award->resource->uri }}" height="35em"> {{ $award->name }}</label>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Otorgar reconocimiento', ['class' => 'form-control btn btn-default']) !!}
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
	<a class="btn btn-default" href="{{ route('accomplishments.index') }}"> <i class="fa fa-times"></i> Cancelar</a>

@endsection