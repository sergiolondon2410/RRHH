@extends('layout')

@section('title', $title)

@section('content')
	<div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $title }}
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Proceso</th>
									<th>Empresa</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($evaluations as $evaluation)
									<tr class="odd gradeX">
										<td>
											<a href="{{ route('evaluations.show', ['evaluation' => $evaluation]) }}"><i class="fa fa-info-circle"></i></a> {{ $evaluation->name }}
										</td>
										<td>{{ $evaluation->description }}</td>
										<td>{{ $evaluation->process->name }}</td>
										<td>{{ $evaluation->process->organization->name }}</td>
										<td>
											<a href="{{ route('evaluations.edit', ['evaluation' => $evaluation]) }}"><i class="fa fa-pencil"></i></a>
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
				<a class="btn btn-default" href="{{ route('evaluations.create') }}"> <i class="fa fa-plus-circle"></i> Nueva evaluación</a>
			</div>
		</div>
	</div>
@endsection