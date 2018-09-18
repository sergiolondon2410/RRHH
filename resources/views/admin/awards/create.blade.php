@extends('layout')

@section('title', "Crear Premio")

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

	{!! Form::open(['url' => route('awards.store'), 'method' => 'POST', 'files' => true])  !!}
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
													{!! Form::label('name', 'Nombre del Premio') !!}
													{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
												</div>
											</div>
											<div class="col-sm-12">			
												<div class="form-group">
													{!! Form::label('description', 'Descripción') !!}
													{!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12">
												{!! Form::label('resource', 'Elija la imagen del premio') !!}
											</div>
											@foreach($resources as $resource)
												<div class="col-sm-2">			
													<div class="form-group">
													<label><input type="radio" value="{{ $resource->id }}" name="resource"><img src="{{ asset('/storage') }}{{$resource->uri}}" height="35em"></label>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Crear Premio', ['class' => 'form-control btn btn-default']) !!}
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
	<a class="btn btn-default" href="{{ route('awards.index') }}"> <i class="fa fa-times"></i> Cancelar</a>

@endsection