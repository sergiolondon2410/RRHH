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

	{!! Form::model($compromise, ['method' => 'POST', 'action' => ['CompromiseController@update', $compromise],  'files' => true])  !!}
		@method('PUT')
		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Asignar compromiso a {{ $compromise->user->full_name }}
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
									{!! Form::label('observation', 'Aspecto a mejorar:') !!}
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
								{!! Form::label('end_date', 'Fecha de cumplimiento:') !!}
							</div>
							<div class="col-lg-12">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									{!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'value' => old('end_date')]) !!}
								</div>
							</div>
							<div class="form-group col-sm-12" style="margin-top: 20px">
								{!! Form::submit('Editar Compromiso', ['class' => 'form-control btn btn-default']) !!}
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
			</div>
			
		</div>	

	{!! Form::close() !!}

	<a class="btn btn-default" href="{{ route('compromises.show', ['compromise' => $compromise]) }}"> <i class="fa fa-times"></i> Cancelar</a>

@endsection

@section('scripts')
	<!-- Datepicker-->
	<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
	<script>
		$('.datepicker').datepicker({
			format: "dd/mm/yyyy",
			language: "es",
			defaultViewDate: {
				year: 2018,
				month: 4,
				day: 25
			},
			autoclose: true
		});
	</script>
@endsection