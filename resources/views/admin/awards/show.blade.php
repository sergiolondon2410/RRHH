@extends('layout')

@section('title', "Premio")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $award->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<img src="{{ asset('/storage') }}/{{$award->resource->uri}}" height="200em">
						</div>
						<div class="col-lg-6">
							<p><strong>Creado por:</strong> {{ $award->creator->name }} {{ $award->creator->last_name }}</p>
							<p><strong>Empresa:</strong> {{ $award->organization->name }}</p>
							<p><strong>Descripción:</strong> {{ $award->description }}</p>
							@if($award->creator_id == Auth::user()->id)
								<div class="row">
									<div class="col-lg-2">
										<a class="btn btn-default" href="{{ route('awards.edit', ['award' => $award]) }}"> <i class="fa fa-pencil"></i> Editar</a>
									</div>
								</div>
							@endif
						</div>
					</div>
					
	            </div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('awards.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection