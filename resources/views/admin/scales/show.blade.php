@extends('layout')

@section('title', "Escala de medición: {$scale->name}")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $scale->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<p><strong>Tipo:</strong> {{ $scale->type }}</p>
							<p><strong>Descripción:</strong> {{ $scale->description }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<a class="btn btn-default" href="{{ route('scales.edit', ['scale' => $scale]) }}"> <i class="fa fa-pencil"></i> Editar</a>
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('scales.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
	    <!-- /.col-lg-12 -->
	</div>
	

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Medidas de esta escala
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Calificación</th>
								<th>Alias</th>
								<th>Valor</th>
								<th>Descripción</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($measures as $measure)
								<tr class="odd gradeX">
									<td>{{ $measure->qualification }}</td>
									<td>{{ $measure->alias }}</td>
									<td>{{ $measure->numeric_value }}</td>
									<td>{{ $measure->description }}</td>
									<td><a href="{{ route('measures.edit', ['measure' => $measure]) }}"><i class="fa fa-pencil"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('measures.create', ['scale' => $scale]) }}"> <i class="fa fa-plus-circle"></i> Nueva medida</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
	</div>

@endsection