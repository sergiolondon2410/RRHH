@extends('layout')

@section('title', "Requerimiento de capacitación")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Requerimiento de capacitación - {{ $training->user->full_name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<p><strong>Usuario:</strong> {{ $training->user->full_name }}</p>
							<p><strong>Área y cargo:</strong> {{ $training->user->area }} - {{ $training->user->position }}</p>
							<p><strong>Requerimiento:</strong> {{ $training->observation }}</p>
							<p><strong>Fecha de solicitud:</strong> {{ Carbon\Carbon::parse($training->created_at)->format('d/m/Y') }}</p>
							<p><strong>Estado:</strong> {{ $status[$training->status] }}</p>
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('trainings.edit', ['training' => $training]) }}"> <i class="fa fa-pencil"></i> Editar Requerimiento</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('trainings.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection