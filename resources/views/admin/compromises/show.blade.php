@extends('layout')

@section('title', "Compromiso")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Compromiso
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Usuario:</strong> {{ $compromise->user->name }} {{ $compromise->user->last_name }}</h4>
						</div>
						<div class="col-lg-12">
							<strong>Validador:</strong> {{ $compromise->validator->name }} {{ $compromise->validator->last_name }}
						</div>
						<div class="col-lg-2">
							<strong>Compromiso:</strong> {{ $compromise->activity }}
						</div>
						<div class="col-lg-10">
							<strong>Observaciones:</strong> {{ $compromise->observation }}
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('compromises.show') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection