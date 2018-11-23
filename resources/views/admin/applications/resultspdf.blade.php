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

	<title>Informe de evaluación - Gente OK</title>

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
				@if(count($competences) > 0)
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Reporte de {{ $evaluation->name }} - Competencias
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<table width="100%" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th></th>
											<th></th>
											@foreach ($competences as $competence)
												<th colspan="3">{{ $competence->name }}</th>
											@endforeach
										</tr>
										<tr>
											<th>Evaluado</th>
											<th>Cargo</th>
											@foreach ($competences as $competence)
												<th>Auto</th>
												<th>Hetero</th>
												<th>Total</th>
											@endforeach
										</tr>
									</thead>
									<tbody>
										@foreach ($users_competences as $user)
												<tr class="odd gradeX">
													<td>{{ $user['user_fullname'] }}</td>
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
							
							</div>
						</div>
						<!-- /.panel -->
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Resultados globales por competencia
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<p><strong>Resultado por Competencias</strong></p>
									</div>
									@foreach($competences as $competence)
										<div class="col-lg-4">
											{{ $competence->name }}: <i>{{ round(collect($competences_summation[$competence->name])->avg(), 3)*100 }}%</i>
										</div>
										<div class="col-lg-8">
											<img src="{{ asset('/storage') }}/100_bar.png" width="{{ round(collect($competences_summation[$competence->name])->avg(), 3)*500 }}em" height="50em">
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				@endif
				@if(count($indicators) > 0)
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Reporte de {{ $evaluation->name }} - Indicadores de productividad
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<table width="100%" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th></th>
											<th></th>
											@foreach ($indicators as $indicator)
												<th colspan="3">{{ $indicator->name }}</th>
											@endforeach
										</tr>
										<tr>
											<th>Evaluado</th>
											<th>Cargo</th>
											@foreach ($indicators as $indicator)
												<th>Auto</th>
												<th>Hetero</th>
												<th>Total</th>
											@endforeach
										</tr>
									</thead>
									<tbody>
										@foreach ($users_indicators as $user)
											<tr class="odd gradeX">
												<td>{{ $user['user_fullname'] }}</td>
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
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Resultados globales por indicadores de productividad
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<p><strong>Resultado por Indicadores de productividad</strong></p>
									</div>
									@foreach($indicators as $indicator)
										<div class="col-lg-4">
											{{ $indicator->name }}: <i>{{ round(collect($indicators_summation[$indicator->name])->avg(), 3)*100 }}%</i>
										</div>
										<div class="col-lg-8">
											<img src="{{ asset('/storage') }}/100_bar.png" width="{{ round(collect($indicators_summation[$indicator->name])->avg(), 3)*500 }}em" height="50em">
										</div>
									@endforeach
								</div>
							</div>
						</div>
						<!-- /.panel -->
					</div>
				@endif
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<!-- Bootstrap Core JavaScript 3.3.7-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('/js/sb-admin-2.js') }}"></script>

</body>

</html>
