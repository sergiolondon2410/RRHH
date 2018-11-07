@extends('layout')

@section('title', "Mis Evaluaciones")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Autoevaluaciones pendientes
				</div>
				<div class="panel-body">
					@if($autoevaluations->count() > 0)
						<table width="100%" class="table table-striped table-bordered table-hover" id="Auto">
							<thead>
								<tr>
									<th>Evaluación</th>
									<th>Estado</th>
									<th>Comenzar</th>
								</tr>
							</thead>
							<tbody>
								@foreach($autoevaluations as $application)
									<tr class="odd gradeX">
										<td>{{ $application->evaluation->name }}</td>
										<td>{{ $status[$application->status] }}</td>
										<td>
											@if($application->status != 'completed')
												<a class="btn btn-default" href="{{ route('answers.index', ['application' => $application]) }}"> <i class="fa fa-pencil"></i> Comenzar</a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">En este momento no tiene autoevaluaciones por contestar</div>
					@endif
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					Heteroevaluaciones pendientes
				</div>
				<div class="panel-body">
					@if($heteroevaluations->count() > 0)
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
										<td>{{ $application->user->full_name }}</td>
										<td>{{ $status[$application->status] }}</td>
										<td>
											@if($application->status != 'completed')
												<a class="btn btn-default" href="{{ route('answers.index', ['application' => $application]) }}"> <i class="fa fa-pencil"></i> Comenzar</a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">En este momento no tiene evaluaciones de terceros por contestar</div>
					@endif
				</div>
				<!-- /.panel-body -->
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					Evaluaciones
				</div>
				<div class="panel-body">
					@if($evaluations->count() > 0)
						<table width="100%" class="table table-striped table-bordered table-hover" id="Auto">
							<thead>
								<tr>
									<th>Evaluación</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($evaluations as $application)
									<tr class="odd gradeX">
										<td>{{ $application->evaluation->name }}</td>
										<td>
											<a class="btn btn-default" href="{{ route('applications.userresults', ['evaluation' => $application->evaluation]) }}"> <i class="fa fa-line-chart"></i> Resultados</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">No tiene evaluaciones asignadas</div>
					@endif
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>

@endsection