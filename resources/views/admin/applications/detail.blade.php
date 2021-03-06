@extends('layout')

@section('title', "Detalle de evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $application->evaluation->name }} 
					@if($application->evaluator_id == $application->user_id)
						- Autoevaluación
					@endif
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Evaluado:</strong> {{ $application->user->name }} {{ $application->user->last_name }}</h4>
						</div>
						@if($application->evaluator_id != $application->user_id)
							<div class="col-lg-12">
								<h4><strong>Evaluador:</strong> {{ $application->evaluator->name }} {{ $application->evaluator->last_name }}</h4>
							</div>
						@endif
						<div class="col-lg-12">
							<strong>Descripción:</strong> {{ $application->evaluation->description }}
						</div>
						<div class="col-lg-12">
							<strong>Tipo de evaluación:</strong>  {{ $application->evaluation->evaluation_type->name }} <i>{{ $application->evaluation->evaluation_type->description }}</i>
							<hr>
						</div>
						<div class="col-lg-12">
							<strong>Estado:</strong> {{ $state[$application->status] }}
						</div>
						@if($application->answers->count() != 0)
							<div class="col-lg-12">
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>Competencia</th>
											<th>Pregunta</th>
											<th>Respuesta</th>
											<th>Valor</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($application->answers as $answer)
											<tr class="odd gradeX">
												<td>{{ $answer->question->competence->name }}</td>
												<td>{{ $answer->question->text }}</td>
												<td>{{ $answer->measure->qualification }} - {{ $answer->measure->alias }}</td>
												<td>{{ $answer->measure->numeric_value }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						@endif
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		@if(count($average) != 0)
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Medición de competencias
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div id="chart_div"></div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
		@endif
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.report', ['evaluation' => $application->evaluation]) }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
@endsection

@section('scripts')

	<script>

		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

		function drawStuff() {
			var data = new google.visualization.arrayToDataTable([
				['Competencia', 'Porcentaje'],
				@foreach($average as $item)
					["{{ $item["competence"]}}", {{ $item["average"]}} ],
				@endforeach
			]);

			var options = {
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
				bar: { groupWidth: "50%" }
			};

			var chart = new google.charts.Bar(document.getElementById('chart_div'));
			chart.draw(data, google.charts.Bar.convertOptions(options));
      };
	</script>

@endsection