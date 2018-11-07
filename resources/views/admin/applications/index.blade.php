@extends('layout')

@section('title', "Detalle de Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h3><i class="fa fa-address-card-o"></i> Usuarios en esta evaluación</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Autoevaluación</th>
								<th>Estado</th>
								<th>Heteroevaluación</th>
								<th>Asignar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr class="odd gradeX">
									<td><a href="{{ route('applications.show', ['user' => $user]) }}"><i class="fa fa-info-circle"></i></a> {{ $user->name }} {{ $user->last_name }}</td>
									<td>
										@foreach ($user->applications as $application)
											@if($application->evaluator_id == $user->id && $application->evaluation_id == $evaluation->id)
												<i class="fa fa-check verde"></i>
											@endif
										@endforeach
									</td>
									<td>
										@foreach ($user->applications as $application)
											@if($application->evaluator_id == $user->id && $application->evaluation_id == $evaluation->id)
												@if($application->status == 'uninitialized')
													Sin responder
												@else
													Finalizado
												@endif
											@endif
										@endforeach
									</td>
									<td>
										@foreach ($user->applications as $application)
											@if($application->evaluator_id != $user->id && $application->evaluation_id == $evaluation->id)
												<i class="fa fa-check verde"></i>{{$application->evaluator->name}} {{ $application->evaluator->last_name }}
											@endif
										@endforeach
									</td>
									<td>
										<a class="btn btn-default" href="{{ route('applications.edit', ['user' => $user, 'evaluation' => $evaluation]) }}">Asignar</a>
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
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('evaluations.show', ['evaluation' => $evaluation->id]) }}"> <i class="fa fa-angle-double-left"></i> Volver a la evaluación</a>
		</div>
	</div>

@endsection