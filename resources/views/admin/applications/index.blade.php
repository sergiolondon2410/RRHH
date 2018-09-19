@extends('layout')

@section('title', "Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Descripción:</strong> {{ $evaluation->description }}</h4>
						</div>
						<div class="col-lg-12">
							<strong>Tipo de evaluación:</strong>  {{ $evaluation->evaluation_type->name }} <i>{{ $evaluation->evaluation_type->description }}</i>
						</div>
						<div class="col-lg-2">
							<strong>Empresa:</strong>  {{ $evaluation->process->organization->name }}
						</div>
						<div class="col-lg-10">
							<strong>Proceso:</strong>  {{ $evaluation->process->name }}
						</div>
						<div class="separador"> <p></p> </div>
						<div class="col-lg-2">
							<a class="btn btn-default" href="{{ route('evaluations.edit', ['evaluation' => $evaluation]) }}"> <i class="fa fa-pencil"></i> Editar Evaluación</a>
						</div>
						<div class="col-lg-10">
							<a class="btn btn-default" href="{{ route('applications.index', ['evaluation' => $evaluation]) }}"> <i class="fa fa-address-card-o"></i> Asignar Evaluación a usuarios</a>
						</div>
					</div>
					<hr>
					<h3><i class="fa fa-address-card-o"></i> Usuarios en esta evaluación</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Autoevaluación</th>
								<th>Estado</th>
								<th>Heteroevaluación</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($evaluation->applications as $application)
								<tr class="odd gradeX">
									<td>{{ $application->user->name }}</td>
									<td>
										@if($application->evaluator_id == $application->evaluator_id)
											Si
										@endif
									</td>
									<td>{{ $application->status }}</td>
									<td></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('evaluationquestion.create', ['evaluation' => $evaluation]) }}"> <i class="fa fa-plus-circle"></i> Agregar pregunta</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('processes.show', ['process' => $evaluation->process]) }}"> <i class="fa fa-angle-double-left"></i> Volver al proceso</a>
		</div>
	</div>

@endsection