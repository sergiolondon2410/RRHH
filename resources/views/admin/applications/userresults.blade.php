@extends('layout')

@section('title', "Resultados de evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Respuestas {{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Competencia</th>
								<th>Pregunta</th>
								<th>Autoevaluación</th>
								<th>Heteroevaluación</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($answers as $answer)
								<tr class="odd gradeX">
									<td>{{ $answer["competence"] }}</td>
									<td>{{ $answer["text"] }}</td>
									<td>{{ $answer["value"] }}</td>
									<td>{{ $answer["heteroevaluation"] }}</td>
									<td>{{ $answer["total"] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
				<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Informe de {{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if(count($competences) > 0)
						<div id="chart_div"></div>
					@endif
					@if(count($indicators) > 0)
						<div id="chart_indicators"></div>
					@endif
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.show') }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
@endsection

@section('scripts')

	<script>

		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {
			@if(count($competences) > 0)
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
			@endif
			@if(count($indicators) > 0)
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
			@endif
		};
	</script>

	<script>
		$(document).ready(function() {
			$('#dataTables').DataTable({
				responsive: true,
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

@endsection

