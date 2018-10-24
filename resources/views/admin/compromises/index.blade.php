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
									<th>Usuario</th>
									<th>Validador</th>
									<th>Aspecto</th>
									<th>Acciones</th>
									<th>Empresa</th>
									<th>Plazo</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($compromises as $compromise)
									<tr class="odd gradeX">
										<td>
											{{ $compromise->user->name }} {{ $compromise->user->last_name }}
										</td>
										<td>
											{{ $compromise->validator->name }} {{ $compromise->validator->last_name }}
										</td>
										<td>{{ $compromise->observation }}</td>
										<td>{{ $compromise->activity }}</td>
										<td>{{ $compromise->user->organization->name }}</td>
										<td>
											{{ Carbon\Carbon::parse($compromise->ending)->format('d/m/Y') }}
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
				<a class="btn btn-default" href="{{ route('compromises.organization') }}"> <i class="fa fa-plus-circle"></i> Nuevo compromiso</a>
			</div>
		</div>
	</div>
@endsection