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

	{!! Form::model($award, ['method' => 'POST', 'action' => ['AwardController@update', $award]])  !!}
	 	@method('PUT')
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
										<div class="form-group">
											{!! Form::label('name', 'Nombre del Premio') !!}
											{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<img src="{{ asset('/storage') }}/{{$award->resource->uri}}" height="150em">
									</div>
									<div class="col-sm-12">			
										<div class="form-group">
											{!! Form::label('description', 'Descripción') !!}
											{!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
										</div>
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Editar Premio', ['class' => 'form-control btn btn-default']) !!}
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

	<a class="btn btn-default" href="{{ route('awards.show', ['award' => $award]) }}">Cancelar</a>

@endsection