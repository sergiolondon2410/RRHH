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

	{!! Form::model($recognition, ['method' => 'POST', 'action' => ['RecognitionController@update', $recognition],  'files' => true])  !!}
		@method('PUT')
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Editar reconocimiento a {{ $recognition->user->full_name }}
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('name', '*Reconocimiento:') !!}
									{!! Form::textarea('name', null, ['class' => 'form-control', 'rows' => 2, 'value' => old('name')]) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('observation', '*Méritos:') !!}
									{!! Form::textarea('observation', null, ['class' => 'form-control', 'rows' => 2, 'value' => old('observation')]) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('grantter', '*Otorgado por:') !!}
									{!! Form::select('grantter', $grantters, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group col-sm-12" style="margin-top: 20px">
								{!! Form::submit('Editar Reconocimiento', ['class' => 'form-control btn btn-default']) !!}
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('recognitions.show', ['recognition' => $recognition]) }}"> <i class="fa fa-times"></i> Cancelar</a>
					</div>
				</div>
			</div>
			
		</div>	

	{!! Form::close() !!}

@endsection