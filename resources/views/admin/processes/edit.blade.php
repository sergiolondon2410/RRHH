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

	{!! Form::model($process, ['method' => 'POST', 'action' => ['ProcessController@update', $process]])  !!}
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
											{!! Form::label('name', 'Nombre del Proceso') !!}
											{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
										</div>
									</div>
									<div class="col-sm-6">			
										<div class="form-group">
											{!! Form::label('organization', 'Empresa:') !!} 
											{!! Form::select('organization', $organizations, $process->organization_id, ['class' => 'form-control']) !!}
										</div>
									</div>
									<div class="col-sm-12">			
										<div class="form-group">
											{!! Form::label('description', 'Descripción') !!}
											{!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
										</div>
									</div>
									<div class="col-sm-3">			
										<div class="form-group">
											{!! Form::label('status', 'Estado:') !!} 
											{!! Form::select('status', $estados, $process->status, ['class' => 'form-control']) !!}
										</div>
									</div>
								</div>	
								<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Editar Proceso', ['class' => 'form-control btn btn-default']) !!}
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

	<a class="btn btn-default" href="{{ route('processes.show', ['process' => $process]) }}">Cancelar</a>

@endsection