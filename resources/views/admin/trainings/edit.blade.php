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

	{!! Form::model($training, ['method' => 'POST', 'action' => ['TrainingController@update', $training],  'files' => true])  !!}
		@method('PUT')
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Editar requerimiento a {{ $training->user->full_name }}
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('observation', '*Requerimiento:') !!}
									{!! Form::textarea('observation', null, ['class' => 'form-control', 'rows' => 2, 'value' => old('observation')]) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('status', '*Estado') !!}
									{!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group col-sm-12" style="margin-top: 20px">
								{!! Form::submit('Editar Requerimiento', ['class' => 'form-control btn btn-default']) !!}
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('trainings.show', ['training' => $training]) }}"> <i class="fa fa-times"></i> Cancelar</a>
					</div>
				</div>
			</div>
			
		</div>	

	{!! Form::close() !!}

@endsection