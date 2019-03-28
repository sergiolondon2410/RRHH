@extends('layout')

@section('title', "Nuevo Compromiso")

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

	{!! Form::open(['url' => route('compromises.store', ['user' => $user, 'evaluation' => $evaluation]), 'method' => 'POST'])  !!}
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Asignar compromiso a {{ $user->full_name }}
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('validator', '*Validador') !!}
									{!! Form::select('validator', $validators, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('observation', '*Aspecto a mejorar:') !!}
									{!! Form::text('observation', null, ['class' => 'form-control', 'value' => old('observation')]) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('activity', '*Acciones:') !!}
									{!! Form::textarea('activity', null, ['class' => 'form-control', 'rows' => 4, 'value' => old('activity')]) !!}
								</div>
							</div>
							<div class="col-lg-12">
								{!! Form::label('date', '*Fecha de cumplimiento:') !!}
							</div>
							<div class="col-lg-12">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control datepicker" name="date">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('alarm', 'Crear alarma:') !!}
									{!! Form::select('alarm', $alarm, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group col-sm-12">
								{!! Form::submit('Crear Compromiso', ['class' => 'form-control btn btn-default']) !!}
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('applications.usercomputation', ['user' => $user, 'evaluation' => $evaluation]) }}"> <i class="fa fa-times"></i> Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}

	<hr>

@endsection

@section('scripts')
	<!-- Datepicker-->
	<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
	<script>
		$('.datepicker').datepicker({
			format: "dd/mm/yyyy",
			language: "es",
			autoclose: true
		});
	</script>
@endsection