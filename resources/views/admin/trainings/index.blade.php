@extends('layout')

@section('title', $title)

@section('content')

@php
	$organization_get = 'undefined';
	$status_get = 'undefined';
	if(request()->get('organization') !== null){
		$organization_get = request()->get('organization');
	}
	if(request()->get('status') !== null){
		$status_get = request()->get('status');
	}
@endphp
	
	<div class="row">
		<div class="col-lg-12">
			@if(Auth::user()->user_type_id < 3)
				<div class="panel panel-default">
					<div class="panel-heading">
						Filtros de búsqueda
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('trainings.index'), 'method' => 'GET']) !!}
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('organization', $organizations, $organization_get, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('status', $status, $status_get, ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group" style="margin-top: 20px">
										{!! Form::submit('Filtrar resultados', ['class' => 'form-control btn btn-default']) !!}
									</div>
								</div>
							</div>
							<!-- /.row (nested) -->
						{!! Form::close() !!}
					</div>
				</div>
			@endif
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
								<th>Requerimiento</th>
								<th>Empresa</th>
								<th>Fecha de solicitud</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($trainings as $training)
								<tr class="odd gradeX">
									<td>
										{{ $training->user->full_name }}
									</td>
									<td>{{ $training->observation }}</td>
									<td>{{ $training->user->organization->name }}</td>
									<td>
										{{ Carbon\Carbon::parse($training->created_at)->format('d/m/Y') }}
									</td>
									<td>{{ $status[$training->status] }}</td>
									<td>
										<a href="{{ route('trainings.show', ['training' => $training]) }}" data-toggle="tooltip" data-placement="bottom" title="Ver más"><i class="fa fa-info-circle fa-fw"></i></a>
										<a href="{{ route('trainings.edit', ['training' => $training]) }}" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil fa-fw"></i></a>
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
	</div>
	
@endsection