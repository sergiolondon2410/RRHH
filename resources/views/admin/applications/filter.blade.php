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
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Filtros de búsqueda
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('organization', 'Empresa:') !!} 
									{!! Form::select('organization', $organizations, null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('process', 'Proceso evaluativo:') !!} 
									<select name="process" id="process" class="form-control">
										<option value="0" disable="true" selected="true">Seleccione un proceso</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									{!! Form::label('evaluation', 'Evaluación:') !!} 
									<select name="evaluation" id="evaluation" class="form-control">
										<option value="0" disable="true" selected="true">Seleccione una evaluación</option>
									</select>
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

@section('scripts')
	<script>

		$('#organization').on('change', function(e){
			var organization_id = e.target.value;
			$.get('{{ route('applications.organization') }}?organization='+organization_id, function(data){
				$('#process').empty();
				$('#process').append('<option value="0" disable="true" selected="true">Seleccione un proceso</option>');
				$.each(data, function(index, processesObj){
					$('#process').append('<option value="'+ processesObj.id +'" disable="true">'+ processesObj.name +'</option>');
				});
			});
		})

		$('#process').on('change', function(e){
			var process_id = e.target.value;
			console.log(process_id);
			$.get('{{ route('applications.process') }}?process='+process_id, function(data){
				console.log(data);
				$('#evaluation').empty();
				$('#evaluation').append('<option value="0" disable="true" selected="true">Seleccione una evaluación</option>');
				$.each(data, function(index, evaluationsObj){
					$('#evaluation').append('<option value="'+ evaluationsObj.id +'" disable="true">'+ evaluationsObj.name +'</option>');
				});
			});
		})
	</script>
@endsection