@extends('layout')

@section('title', "Informe de usuario")

@section('content')

	<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Informe de {{ $evaluation->name}} - {{ $user->name }} {{ $user->last_name }}
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div id="chart_div"></div>

						<div id="chart_indicators"></div>
					</div>
				</div>
				<!-- /.panel -->
			</div>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Compromisos - {{ $user->name }} {{ $user->last_name }}
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						@if($compromises->count() > 0)
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>Validador</th>
										<th>Compromiso</th>
										<th>Empresa</th>
										<th>Plazo</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($compromises as $compromise)
										<tr class="odd gradeX">
											<td>
												{{ $compromise->user->name }} {{ $compromise->user->last_name }}
											</td>
											<td>
												{{ $compromise->validator->name }} {{ $compromise->validator->last_name }}
											</td>
											<td>{{ $compromise->activity }}</td>
											<td>{{ $compromise->user->organization->name }}</td>
											<td>
												{{ Carbon\Carbon::parse($compromise->ending)->format('d/m/Y') }}
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<div class="alert alert-warning" role="alert">Este usuario no tiene compromisos asignados</div>
						@endif
					</div>
					<div class="panel-footer">
						<a class="btn btn-default" href="{{ route('compromises.create', ['user' => $user, 'evaluation' => $evaluation]) }}"> <i class="fa fa-plus-circle"></i> Asignar un compromiso</a>
					</div>
				</div>
				<!-- /.panel -->
			</div>

		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.results', ['evaluation' => $evaluation]) }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
@endsection

@section('scripts')

	<script>

		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {
			var data = new google.visualization.arrayToDataTable([
				['Competencia', 'Autoevaluación', 'Heteroevaluación', 'Porcentaje Total Competencia'],
				@foreach($competences as $competence)
					[
						"{{ $competence->name }}", 
						{{ $user_competences["competences_avg"][$competence->id]["auto"] }},
						{{ $user_competences["competences_avg"][$competence->id]["hetero"] }},
						{{ $user_competences["competences_avg"][$competence->id]["total"] }}
					],
				@endforeach
			]);
			var options = {
				chart: {
					title: 'Resultado por Competencias',
					subtitle: 'Porcentajes de Autoevaluación, Heteroevaluación y Total',
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

			var chart = new google.charts.Bar(document.getElementById('chart_div'));
			chart.draw(data, google.charts.Bar.convertOptions(options));

			var data_indicators = new google.visualization.arrayToDataTable([
				['Indicador', 'Autoevaluación', 'Heteroevaluación', 'Porcentaje Total Indicador'],
				@foreach($indicators as $indicator)
					[
						"{{ $indicator->name }}", 
						{{ $user_indicators["competences_avg"][$indicator->id]["auto"] }},
						{{ $user_indicators["competences_avg"][$indicator->id]["hetero"] }},
						{{ $user_indicators["competences_avg"][$indicator->id]["total"] }}
					],
				@endforeach
			]);
			var options_indicators = {
				chart: {
					title: 'Resultado por Indicadores de productividad',
					subtitle: 'Porcentajes de Autoevaluación, Heteroevaluación y Total',
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

			var chart = new google.charts.Bar(document.getElementById('chart_indicators'));
			chart.draw(data_indicators, google.charts.Bar.convertOptions(options_indicators));
		};
	</script>

@endsection