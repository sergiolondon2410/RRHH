@extends('layout')

@section('title', "Crear Medición")

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

	{!! Form::open(['url' => route('measures.store', ['scale' => $scale]), 'method' => 'POST', 'files' => true])  !!}
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
											{!! Form::label('qualification', 'Calificación') !!}
											{!! Form::text('qualification', null, ['class' => 'form-control', 'value' => old('qualification')]) !!}
										</div>
									</div>
									<div class="col-sm-6">			
										<div class="form-group">
											{!! Form::label('numeric_value', 'Valor numérico') !!}
											{!! Form::text('numeric_value', null, ['class' => 'form-control', 'value' => old('numeric_value')]) !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('alias', 'Alias') !!}
											{!! Form::text('alias', null, ['class' => 'form-control', 'value' => old('alias')]) !!}
										</div>
									</div>
									<div class="col-sm-12">			
										<div class="form-group">
											{!! Form::label('description', 'Descripción') !!}
											{!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
										</div>
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Crear Escala', ['class' => 'form-control btn btn-default']) !!}
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

	<p><a href="{{ route('scales.show', ['scale' => $scale]) }}">Volver a la escala de medición</a></p>

@endsection