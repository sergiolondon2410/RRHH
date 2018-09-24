@extends('layout')

@section('title', "Responder Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $application->evaluation->name }} 
					@if(Auth::user()->id == $application->user_id)
						- Autoevaluación
					@endif
				</div>
				<div class="panel-body">
					<div class="row">
						@if(Auth::user()->id != $application->user_id)
							<div class="col-lg-12">
								<h4><strong>Evaluando:</strong> {{ $application->user->name }} {{ $application->user->last_name }}</h4>
							</div>
						@endif
						<div class="col-lg-12">
							<strong>Descripción:</strong> {{ $application->evaluation->name }}
						</div>
						<div class="col-lg-12">
							<strong>Tipo de evaluación:</strong>  {{ $application->evaluation->evaluation_type->name }} <i>{{ $application->evaluation->evaluation_type->description }}</i>
						</div>
						<div class="col-lg-12">
							<a class="btn btn-default" href="{{ route('answers.create', ['application' => $application]) }}"> <i class="fa fa-flag-checkered"></i> Responder evaluación</a>
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.show') }}"> <i class="fa fa-times"></i> En otro momento</a>
		</div>
	</div>

@endsection