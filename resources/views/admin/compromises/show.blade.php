@extends('layout')

@section('title', "Compromiso")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Compromiso
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<p><strong>Usuario:</strong> {{ $compromise->user->full_name }}</p>
							<p><strong>Validador:</strong> {{ $compromise->validator->full_name }}</p>
							<p><strong>Aspecto a mejorar:</strong> {{ $compromise->observation }}</p>
							<p><strong>Acciones:</strong> {{ $compromise->activity }}</p>
							<p><strong>Plazo:</strong> {{ Carbon\Carbon::parse($compromise->ending)->format('d/m/Y') }}</p>
							<p><strong>Estado:</strong> {{ $status[$compromise->status] }}</p>
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('compromises.edit', ['compromise' => $compromise]) }}"> <i class="fa fa-pencil"></i> Editar compromiso</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('compromises.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection