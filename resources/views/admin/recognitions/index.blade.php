@extends('layout')

@section('title', $title)

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Reconocimientos
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					@if($recognitions->count() > 0)
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Insignia</th>
									<th>Reconocimiento</th>
									<th>Otorgado a</th>
									<th>Méritos</th>
									<th>Otorgado por</th>
									<th>Empresa</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($recognitions as $recognition)
									<tr class="odd gradeX">
										<td>
											<img src="{{ asset('/storage') }}{{$recognition->resource->uri}}" height="100em">
										</td>
										<td>{{ $recognition->name }}</td>
										<td>{{ $recognition->user->full_name }}</td>
										<td>{{ $recognition->observation }}</td>
										<td>{{ $recognition->grantter->full_name }}</td>
										<td>{{ $recognition->user->organization->name }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">No hay reconocimientos otorgados</div>
					@endif
				</div>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>

@endsection