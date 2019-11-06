@extends('layout') 

@section('title', "Registro de resultados - $organization->name")

@section('content')

@php
	$position_get = 'undefined';
	$area_get = 'undefined';
	if(request()->get('position') !== null){
		$position_get = request()->get('position');
	}
	if(request()->get('area') !== null){
		$area_get = request()->get('area');
	}
@endphp

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Filtros de búsqueda
				</div>
				<div class="panel-body">
					{!! Form::open(['url' => route('applications.results', ['evaluation' => $evaluation]), 'method' => 'GET'])  !!}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									{!! Form::select('position', $positions, $position_get, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									{!! Form::select('area', $areas, $area_get, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group" style="margin-top: 20px">
									{!! Form::submit('Filtrar resultados', ['class' => 'form-control btn btn-default']) !!}
								</div>
							</div>
						</div>
						<!-- /.row (nested) -->
					{!! Form::close() !!}
				</div>
			</div>
				<!-- /.panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					Registro de resultados - {{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if(count($competences) > 0)
						<h3>Resultados por competencias</h3>
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Evaluado</th>
									<th>Cargo</th>
									@foreach ($competences as $competence)
										<th>Auto</th>
										<th>Hetero</th>
										<th>Total: {{ $competence->name }}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@foreach ($users_competences as $user)
										<tr class="odd gradeX">
											<td><a href="{{ route('applications.usercomputation', ['user' => $user['user_id'], 'evaluation' => $evaluation]) }}"><i class="fa fa-search-plus"></i></a> {{ $user['user_fullname'] }}</td>
											<td>{{ $user['user_position'] }}</td>
											@foreach ($competences as $competence)
												<td>{{ $user['competences_avg'][$competence->id]['auto']*100 }}%</td>
												<td>{{ $user['competences_avg'][$competence->id]['hetero']*100 }}%</td>
												<td>{{ $user['competences_avg'][$competence->id]['total']*100 }}%</td>
											@endforeach
										</tr>
								@endforeach
							</tbody>
						</table>
						<hr>
					@endif
					@if(count($indicators) > 0)
						<h3>Resultados por indicadores de productividad</h3>
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
							<thead>
								<tr>
									<th>Evaluado</th>
									<th>Cargo</th>
									@foreach ($indicators as $indicator)
										<th>Auto</th>
										<th>Hetero</th>
										<th>Total: {{ $indicator->name }}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@foreach ($users_indicators as $user)
									<tr class="odd gradeX">
										<td><a href="{{ route('applications.usercomputation', ['user' => $user['user_id'], 'evaluation' => $evaluation]) }}"><i class="fa fa-search-plus"></i></a> {{ $user['user_fullname'] }}</td>
										<td>{{ $user['user_position'] }}</td>
										@foreach ($indicators as $indicator)
											<td>{{ $user['competences_avg'][$indicator->id]['auto']*100 }}%</td>
											<td>{{ $user['competences_avg'][$indicator->id]['hetero']*100 }}%</td>
											<td>{{ $user['competences_avg'][$indicator->id]['total']*100 }}%</td>
										@endforeach
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		@if(count($competences) > 0)
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Gráficas por competencia
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						@foreach ($competences as $competence)
							<div id="chart_competence_{{ $competence->id }}"></div>
						@endforeach
					</div>
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('applications.competenceschartprint', ['evaluation' => $evaluation, 'position' => $position_get, 'area' => $area_get, 'competence_type' => 'Competencias']) }}" target="_blank"> <i class="fa fa-file-pdf-o"></i> Exportar esta gráfica a PDF</a>
					</div>
				</div>
				<!-- /.panel -->
			</div>
		@endif
		@if(count($indicators) > 0)
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Gráficas por indicador de productividad
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						@foreach ($indicators as $indicator)
							<div id="chart_indicator_{{ $indicator->id }}"></div>
						@endforeach
					</div>
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('applications.competenceschartprint', ['evaluation' => $evaluation, 'position' => $position_get, 'area' => $area_get, 'competence_type' => 'Indicadores']) }}" target="_blank"> <i class="fa fa-file-pdf-o"></i> Exportar esta gráfica a PDF</a>
					</div>
				</div>
				<!-- /.panel -->
			</div>
		@endif
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Resultados globales de medición
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if(count($competences) > 0)
						<div id="chart_global_competences"></div>
					@endif
					@if(count($indicators) > 0)
						<div id="chart_global_indicators"></div>
					@endif
				</div>
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('applications.globalchartprint', ['evaluation' => $evaluation, 'position' => $position_get, 'area' => $area_get]) }}" target="_blank"> <i class="fa fa-file-pdf-o"></i> Exportar esta gráfica a PDF</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.report', ['evaluation' => $evaluation]) }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
	
@endsection

@section('scripts')

	<script>
		$(document).ready(function() {
			$('#dataTables').DataTable({
				responsive: true,
				dom: 'Bfrtip',
				buttons: ['excel', 'pdf'],
				language:{
					"sSearch":         "Buscar:",
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					}
				}
			});
		});
	</script>

	<script>

		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {
			@if(count($competences) > 0)
				@foreach ($competences as $competence)
					var data_{{$competence->id}} = new google.visualization.arrayToDataTable([
						['Competencia', 'Porcentaje Total Competencia'],
						@foreach($users_competences as $user)
							[
								'{{ $user['user_fullname'] }}',
								{{ $user['competences_avg'][$competence->id]['total']*100 }}
							],
						@endforeach
					]);
					var options_{{$competence->id}} = {
						chart: {
							title: '{{$competence->name}}'
						},
						legend: { position: 'none' },
						axes: {
							x: {
								0: { side: 'bottom', label: 'Evaluados'}
							}
						},
						vAxis: {
							format: '#,##%',
							gridlines: {
								count: 10,
							},
						},
						height: 400,
						width: 900,
						colors: ['{{ $competence->color }}'],
						bar: { groupWidth: "50%" }
					};

					var chart_{{$competence->id}} = new google.charts.Bar(document.getElementById('chart_competence_{{ $competence->id }}'));
					chart_{{$competence->id}}.draw(data_{{$competence->id}}, google.charts.Bar.convertOptions(options_{{$competence->id}}));
				@endforeach
			@endif
			@if(count($indicators) > 0)
				@foreach ($indicators as $indicator)
					var data_{{$indicator->id}} = new google.visualization.arrayToDataTable([
						['Indicador de productividad', 'Porcentaje Total Competencia'],
						@foreach($users_indicators as $user)
							[
								"{{ $user['user_fullname'] }}",
								{{ $user['competences_avg'][$indicator->id]['total']*100 }}
							],
						@endforeach
					]);
					var options_{{$indicator->id}} = {
						chart: {
							title: '{{$indicator->name}}'
						},
						legend: { position: 'none' },
						
						vAxis: {
							format: '#,##%',
							gridlines: {
								count: 10,
							},
						},
						hAxis: {
							title: "Evaluados",
							slantedText: true,
							slantedTextAngle: 90
						},
						height: 400,
						width: 900,
						colors: ['{{ $indicator->color }}'],
						bar: { groupWidth: "50%" },
						chartArea: { 'width': '82%', height: '60%', top: '9%', left: '15%', right: '3%', bottom: '0'}
					};

					var chart_{{$indicator->id}} = new google.charts.Bar(document.getElementById('chart_indicator_{{ $indicator->id }}'));
					chart_{{$indicator->id}}.draw(data_{{$indicator->id}}, google.charts.Bar.convertOptions(options_{{$indicator->id}}));
				@endforeach
			@endif
			@if(count($competences) > 0)
				var data_competences = new google.visualization.arrayToDataTable([
					['Competencia', 'Total'],
					@foreach($competences as $competence)
						[
							"{{ $competence->name }}", 
							{{ round(collect($competences_summation[$competence->name])->avg(), 3)*100 }}
						],
					@endforeach
				]);
				var options_competences = {
					chart: {
						title: 'Resultado por Competencias',
						subtitle: 'Porcentaje total',
					},
					legend: { position: 'none' },
					axes: {
						x: {
							0: { side: 'bottom', label: 'Competencias'}
						}
					},
					vAxis: {
						format: '#,##%',
						gridlines: {
							count: 10,
						},
					},
					height: 400,
					width: 900,
					bar: { groupWidth: "50%" }
				};

				var chart = new google.charts.Bar(document.getElementById('chart_global_competences'));
				chart.draw(data_competences, google.charts.Bar.convertOptions(options_competences));
			@endif
			@if(count($indicators) > 0)
				var data_indicators = new google.visualization.arrayToDataTable([
					['Indicador', 'Total'],
					@foreach($indicators as $indicator)
						[
							"{{ $indicator->name }}", 
							{{ round(collect($indicators_summation[$indicator->name])->avg(), 3)*100 }}
						],
					@endforeach
				]);
				var options_indicators = {
					chart: {
						title: 'Resultado por Indicadores de productividad',
						subtitle: 'Porcentaje total',
					},
					legend: { position: 'none' },
					axes: {
						x: {
							0: { side: 'bottom', label: 'Indicadores'}
						}
					},
					vAxis: {
						format: '#,##%',
						gridlines: {
							count: 10,
						},
					},
					height: 400,
					width: 900,
					bar: { groupWidth: "50%" }
				};

				var chart = new google.charts.Bar(document.getElementById('chart_global_indicators'));
				chart.draw(data_indicators, google.charts.Bar.convertOptions(options_indicators));
			@endif
		};
	</script>

@endsection