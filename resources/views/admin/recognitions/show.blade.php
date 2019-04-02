@extends('layout')

@section('title', "Reconocimiento")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Reconocimiento - {{ $recognition->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="row">
						<div class="col-lg-4">
							<img src="{{ asset('/storage') }}{{$recognition->resource->uri}}" height="200em">
						</div>
						<div class="col-lg-6">
							<p><strong>Otorgado a:</strong> {{ $recognition->user->full_name }}</p>
							<p><strong>Méritos:</strong> {{ $recognition->observation }}</p>
							<p><strong>Otorgado por:</strong> {{ $recognition->grantter->full_name }}</p>
							<p><strong>Empresa:</strong> {{ $recognition->user->organization->name }}</p>
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('recognitions.edit', ['recognition' => $recognition]) }}"> <i class="fa fa-pencil"></i> Editar Reconocimiento</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('recognitions.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection