@extends('layout')

@section('title', "Ver reportes de evaluaciones")

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

	{!! Form::open(['url' => route('applications.report'), 'method' => 'GET'])  !!}
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('evaluation', 'Empresa:') !!} 
									{!! Form::select('evaluation', $evaluations, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group" style="margin-top: 20px">
									{!! Form::submit('Consultar evaluación', ['class' => 'form-control btn btn-default']) !!}
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

@endsection