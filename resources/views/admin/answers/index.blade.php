@extends('layout')

@section('title', "Responder Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $application->evaluation->name }}
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Descripción:</strong> {{ $application->evaluation->name }}</h4>
						</div>
						<div class="col-lg-12">
							<strong>Tipo de evaluación:</strong>  {{ $application->evaluation->evaluation_type->name }} <i>{{ $application->evaluation->evaluation_type->description }}</i>
						</div>
					</div>
					<hr>
					
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

@endsection