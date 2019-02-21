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

	<title>Registro de resultados - {{ $evaluation->name }} - Gente OK</title>

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
		{{-- <div id="page-wrapper"> --}}
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<h1 class="page-header">Registro de resultados</h1>
				</div>
				@if(count($competences) > 0)
					<div class="col-lg-10 col-lg-offset-1">
						<div class="panel panel-default">
							<div class="panel-heading">
								Gráficas por competencia - Evaluación: {{ $evaluation->name }}
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								@foreach($competences as $competence)
									<div class="row">
										<div class="col-lg-12">
											<p><strong>{{ $competence->name }}</strong></p>
										</div>
										@foreach($users_competences as $user_competence)
											<div class="col-lg-4">
												{{ $user_competence['user_fullname'] }}: <i>{{ round(collect($user_competence['competences_avg'][$competence->id]['total'])->avg(), 3)*100 }}%</i>
											</div>
											<div class="col-lg-8">
												<img src="{{ asset('/storage') }}/100_bar.png" width="{{ round(collect($user_competence['competences_avg'][$competence->id]['total'])->avg(), 3)*500 }}em" height="50em">
											</div>
										@endforeach
									</div>
								@endforeach
							</div>
						</div>
					</div>
				@endif
			</div>
		{{-- </div> --}}
	</div>
	
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<!-- Bootstrap Core JavaScript 3.3.7-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('/js/sb-admin-2.js') }}"></script>

</body>

</html>
