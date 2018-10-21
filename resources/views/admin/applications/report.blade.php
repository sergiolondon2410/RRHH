@extends('layout')

@section('title', "Reporte de Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h4><i class="fa fa-bullhorn"></i> Resultados: {{ $evaluation->applications->count() }} evaluaciones</h4>
					<a class="btn btn-default" href="{{ route('applications.results', ['evaluation' => $evaluation ]) }}"> <i class="fa fa-bar-chart"></i> Ver el registro de resultados</a>
					<hr>
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
									<td><a href="{{ route('applications.detail', ['application' => $application]) }}"><i class="fa fa-info-circle"></i></a> {{ $application->evaluator->name }} {{ $application->evaluator->last_name }}</td>
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
		<!-- /.col-lg-18 -->
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Gráficas
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div id="pie-chart" ></div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.filter') }}"> <i class="fa fa-angle-double-left"></i> Volver a la buscar</a>
		</div>
	</div>

@endsection

@section('scripts')

	<script>
	jQuery(function(){
		var data = [
				{label: "Finalizadas", value: {{ $completed }} },
				{label: "Sin finalizar", value: {{ $started }} },
				{label: "Sin responder", value: {{ $uninitialized }} }
		];
		Morris.Donut({
			element: 'pie-chart',
			data : data,
			lineColors:['gray','red']
		});
	});
	</script>

@endsection