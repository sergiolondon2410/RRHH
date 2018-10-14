@extends('layout')

@section('title', "Reporte de Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h4><i class="fa fa-bullhorn"></i> Resultados: {{ $evaluation->applications->count() }} evaluaciones</h4>
					<p><strong>Finalizadas:</strong> {{ $completed }}%  <strong>Sin responder:</strong> {{ $uninitialized }}%  <strong>Sin finalizar:</strong> {{ $started }}%</p>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Evaluador</th>
								<th>Evaluado</th>
								<th>Estado</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($evaluation->applications as $application)
								<tr class="odd gradeX">
									<td>{{ $application->evaluator->name }} {{ $application->evaluator->last_name }}</td>
									<td>{{ $application->user->name }} {{ $application->user->last_name }}</td>
									<td>
										@if($application->status == 'uninitialized')
											Sin responder
										@elseif($application->status == 'started')
											Sin finalizar
										@else
											Finalizado
										@endif
									</td>
									<td>{{ $application->updated_at }}</td>
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
			<a class="btn btn-default" href="{{ route('applications.filter') }}"> <i class="fa fa-angle-double-left"></i> Volver a la buscar</a>
		</div>
	</div>

@endsection