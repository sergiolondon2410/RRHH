@extends('layout')

@section('title', "Proceso de evaluación")

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $process->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<p><strong>Empresa:</strong> {{ $process->organization->name }}</p>
							<p><strong>Descripción:</strong> {{ $process->description }}</p>
							<p><strong>Estado:</strong> {{ $process->status }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<a class="btn btn-default" href="{{ route('processes.edit', ['process' => $process]) }}"> <i class="fa fa-pencil"></i> Editar Proceso</a>
						</div>
					</div>
					<hr>
					<h3><i class="fa fa-star"></i> Evaluaciones en este proceso</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Evaluación</th>
								<th>Tipo</th>
								<th>Descripción</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($evaluations as $evaluation)
								<tr class="odd gradeX">
									<td>
										<a href="{{ route('evaluations.show', ['evaluation' => $evaluation]) }}"><i class="fa fa-info-circle"></i></a> {{ $evaluation->name }}
									</td>
									<td>{{ $evaluation->evaluation_type->name }}</td>
									<td>{{ $evaluation->description }}</td>
									<td>
										<a href="{{ route('evaluations.edit', ['evaluation' => $evaluation]) }}"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('evaluations.create', ['process' => $process]) }}"> <i class="fa fa-plus-circle"></i> Nueva evaluación</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('processes.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection