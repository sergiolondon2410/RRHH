@extends('layout')

@section('title', $title)

@section('content')

@php
	$organization_get = 'undefined';
	if(request()->get('organization') !== null){
		$organization_get = request()->get('organization');
	}
@endphp

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
					<div class="panel-heading">
						Filtros de búsqueda
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('recognitions.index'), 'method' => 'GET']) !!}
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('organization', $organizations, $organization_get, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-lg-2 col-md-offset-1">
									<div class="form-group">
										{!! Form::submit('Filtrar resultados', ['class' => 'form-control btn btn-default']) !!}
									</div>
								</div>
							</div>
							<!-- /.row (nested) -->
						{!! Form::close() !!}
					</div>
				</div>
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
									<th>Acciones</th>
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
										<td>
											<a href="{{ route('recognitions.show', ['recognition' => $recognition]) }}" data-toggle="tooltip" data-placement="bottom" title="Ver más"><i class="fa fa-info-circle fa-fw"></i></a>
											<a href="{{ route('recognitions.edit', ['recognition' => $recognition]) }}" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil fa-fw"></i></a>
											{!! Form::model($recognition, ['method' => 'POST', 'action' => ['RecognitionController@destroy', $recognition->id],  'files' => true])  !!}
												@method('DELETE')
												<input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('Está seguro de eliminar el reconocimiento {{ $recognition->name }}? ')">
											{!! Form::close() !!}
										</td>
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