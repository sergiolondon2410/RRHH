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
			<div class="panel panel-default">
				@if(Auth::user()->user_type_id < 3)
					<div class="panel-heading">
						Filtros de búsqueda
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('compromises.index'), 'method' => 'GET']) !!}
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
				@endif
			</div>
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
								<th>Aspecto a mejorar</th>
								<th>Acciones</th>
								<th>Empresa</th>
								<th>Plazo</th>
								<th>Estado</th>
								@if(Auth::user()->user_type_id < 3)
									<th>Acciones</th>
								@endif
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
									<td>{{ $status[$compromise->status] }}</td>
									@if(Auth::user()->user_type_id < 3)
										<td>
											<a href="{{ route('compromises.show', ['compromise' => $compromise]) }}" data-toggle="tooltip" data-placement="bottom" title="Ver más"><i class="fa fa-info-circle fa-fw"></i></a>
											<a href="{{ route('compromises.edit', ['compromise' => $compromise]) }}" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil fa-fw"></i></a>
										</td>
									@endif
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
	
@endsection