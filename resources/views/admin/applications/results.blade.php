@extends('layout')

@section('title', "Registro de resultados")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Registro de resultados - {{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if(count($competences) > 0)
						<h3>Resultados por competencias</h3>
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
											<td><a href="{{ route('applications.usercomputation', ['user' => $user['user_id'], 'evaluation' => $evaluation]) }}"><i class="fa fa-search-plus"></i></a> {{ $user['user_fullname'] }}</td>
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
					@endif
					@if(count($indicators) > 0)
						<h3>Resultados por indicadores de productividad</h3>
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
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
										<td><a href="{{ route('applications.usercomputation', ['user' => $user['user_id'], 'evaluation' => $evaluation]) }}"><i class="fa fa-search-plus"></i></a> {{ $user['user_fullname'] }}</td>
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
					@endif
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.report', ['evaluation' => $evaluation]) }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
	
@endsection

@section('scripts')

	<script>
		$(document).ready(function() {
			$('#dataTables').DataTable({
				responsive: true,
				language:{
					"sSearch":         "Buscar:",
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					}
				}
			});
		});
	</script>

@endsection