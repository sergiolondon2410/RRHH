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
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Evaluado</th>
								<th>Estado</th>
								@foreach ($competences as $competence)
									<th>{{ $competence->name }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
									<tr class="odd gradeX">
										<td>{{ $user->name }} {{ $user->last_name }}</td>
										<td>{{ $user->position }}</td>
										@foreach ($user->competencias as $competence)
											<td>{{ $competence->name }}</td>
										@endforeach
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
		<div class="col-lg-12">
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
			<a class="btn btn-default" href=""> <i class="fa fa-angle-double-left"></i> Volver a la buscar</a>
		</div>
	</div>

@endsection

@section('scripts')
	
<script>
jQuery(function(){
	Morris.Donut({
		element: 'pie-chart',
		data: [
			{label: "Finalizadas", value: '25'},
			{label: "Sin finalizar", value: '25' },
			{label: "Sin responder", value: '50' }
		]
	});
});
</script> 
@endsection