@extends('layout')

@section('title', $title)

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Compromisos - {{ $user->name }} {{ $user->last_name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if($compromises->count() > 0)
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Aspecto a mejorar</th>
									<th>Acciones</th>
									<th>Validador</th>
									<th>Plazo</th>
									<td>Estado</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($compromises as $compromise)
									<tr class="odd gradeX">
										<td>{{ $compromise->observation }}</td>
										<td>{{ $compromise->activity }}</td>
										<td>
											{{ $compromise->validator->name }} {{ $compromise->validator->last_name }}
										</td>
										<td>
											{{ Carbon\Carbon::parse($compromise->ending)->format('d/m/Y') }}
										</td>
										<td>{{ $status[$compromise->status] }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">No tiene compromisos asignados</div>
					@endif
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
@endsection