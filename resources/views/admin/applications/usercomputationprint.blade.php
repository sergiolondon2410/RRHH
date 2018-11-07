<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/png" href="{{ asset('/images/favicon.png') }}"/>

	<title>Informe de usuario - Gente OK</title>

	<!-- Bootstrap Core CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/StylePersonaliz.css') }}" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Respuestas {{ $evaluation->name }} - Evaluado:  {{ $user->full_name }}
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
							Informe de {{ $evaluation->name}} - {{ $user->name }} {{ $user->last_name }}
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
											<th>Aspecto a mejorar</th>
											<th>Acciones</th>
											<th>Validador</th>
											<th>Plazo</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($compromises as $compromise)
											<tr class="odd gradeX">
												<td>{{ $compromise->observation }}</td>
												<td>{{ $compromise->activity }}</td>
												<td>
													{{ $compromise->validator->name }} {{ $compromise->validator->last_name }}
												</td>
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
					</div>
				</div>
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Reconocimientos - {{ $user->name }} {{ $user->last_name }}
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							@if($recognitions->count() > 0)
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
									<thead>
										<tr>
											<th>Insignia</th>
											<th>Reconocimiento</th>
											<th>Méritos</th>
											<th>Otorgado Por</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($recognitions as $recognition)
											<tr class="odd gradeX">
												<td>
													<img src="{{ asset('/storage') }}{{$recognition->resource->uri}}" height="100em">
												</td>
												<td>
													{{ $recognition->name }}
												</td>
												<td>{{ $recognition->observation }}</td>
												<td>
													{{ $recognition->grantter->name }} {{ $recognition->grantter->last_name }}
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<div class="alert alert-warning" role="alert">Este usuario no tiene reconocimientos otorgados</div>
							@endif
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Requerimientos de capacitación - {{ $user->full_name }}
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							@if($trainings->count() > 0)
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
									<thead>
										<tr>
											<th>Requerimiento</th>
											<th>Fecha de solicitud</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($trainings as $training)
											<tr class="odd gradeX">
												<td>{{ $training->observation }}</td>
												<td>
													{{ Carbon\Carbon::parse($training->created_at)->format('d/m/Y') }}
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<div class="alert alert-warning" role="alert">Este usuario no registra requerimientos de capacitación</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<!-- Bootstrap Core JavaScript 3.3.7-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Google Charts -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('/js/sb-admin-2.js') }}"></script>

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

</body>

</html>
