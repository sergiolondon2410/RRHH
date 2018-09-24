@extends('layout')

@section('title', "Mis Evaluaciones")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Descripción:</strong> Bla bla</h4>
						</div>
						<div class="col-lg-12">
							<strong>Tipo de evaluación:</strong>  Bla <i>Bla</i>
						</div>
					</div>
					<hr>
					<h3><i class="fa fa-check-square-o"></i> Autoevaluaciones</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="Auto">
						<thead>
							<tr>
								<th>Evaluación</th>
								<th>Estado</th>
								<th>Comenzar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($autoevaluations as $application)
								<tr class="odd gradeX">
									<td>{{ $application->evaluation->name }}</td>
									<td>{{ $application->status }}</td>
									<td>
										<a class="btn btn-default" href="{{ route('answers.index', ['application' => $application]) }}"> <i class="fa fa-pencil"></i> Comenzar</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<hr>
					<h3><i class="fa fa-check-square-o"></i> Heteroevaluaciones</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="Auto">
						<thead>
							<tr>
								<th>Evaluación</th>
								<th>Evaluado</th>
								<th>Estado</th>
								<th>Comenzar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($heteroevaluations as $application)
								<tr class="odd gradeX">
									<td>{{ $application->evaluation->name }}</td>
									<td>{{ $application->user->name }} {{ $application->user->last_name }}</td>
									<td>{{ $application->status }}</td>
									<td>
										<a class="btn btn-default" href="{{ route('answers.index', ['application' => $application]) }}"> <i class="fa fa-pencil"></i> Comenzar</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

@endsection