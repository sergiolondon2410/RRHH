@extends('layout')

@section('title', "Reconocimiento")

@section('content')

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $accomplishment->award->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3">
							<img src="{{ asset('/storage') }}/{{$accomplishment->award->resource->uri}}" height="170em">
						</div>
						<div class="col-lg-8">
							<p><strong>Otorgado a:</strong> {{ $accomplishment->user->name }} {{ $accomplishment->user->last_name }}</p>
							<p><strong>Observación:</strong> {{ $accomplishment->observation }}</p>
							<p><strong>Descripción:</strong> {{ $accomplishment->award->description }}</p>
							<p><strong>Otorgado por:</strong> {{ $accomplishment->giver->name }} {{ $accomplishment->giver->last_name }}</p>
							@if($accomplishment->giver_id == Auth::user()->id)
								<div class="row">
									<div class="col-lg-2">
										<a class="btn btn-default" href="{{ route('accomplishments.edit', ['accomplishment' => $accomplishment]) }}"> <i class="fa fa-pencil"></i> Editar</a>
									</div>
									<div class="col-lg-2">
										{!! Form::model($accomplishment, ['method' => 'POST', 'action' => ['AccomplishmentController@destroy', $accomplishment->id],  'files' => true]) !!}
											@method('DELETE')
											<input type="submit" class="btn btn-danger" value="Eliminar" onclick="return confirm('Está seguro de eliminar el reconocimiento {{ $accomplishment->award->name }} otorgado a {{ $accomplishment->user->name }} {{ $accomplishment->user->last_name }}? ')">
										{!! Form::close() !!}
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
			<a class="btn btn-default" href="{{ route('accomplishments.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection