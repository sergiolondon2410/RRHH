@extends('layout')

@section('title', "Evaluación completa")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h3>¡Felicitaciones {{ $application->evaluator->name }} has completado la evaluación!</h3>
			<!-- <img src="{{ asset('/images/EndEval.png') }}" height="400em"> -->
		</div>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Respuestas - {{ $application->evaluation->name }} 
					@if($application->evaluator_id == $application->user_id)
						- Autoevaluación
					@endif
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Evaluado:</strong> {{ $application->user->name }} {{ $application->user->last_name }}</h4>
						</div>
						@if($application->evaluator_id != $application->user_id)
							<div class="col-lg-12">
								<h4><strong>Evaluador:</strong> {{ $application->evaluator->name }} {{ $application->evaluator->last_name }}</h4>
							</div>
						@endif
						@if($application->answers->count() != 0)
							<div class="col-lg-12">
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>Competencia</th>
											<th>Pregunta</th>
											<th>Respuesta</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($application->answers as $answer)
											<tr class="odd gradeX">
												<td>{{ $answer->question->competence->name }}</td>
												<td>{{ $answer->question->text }}</td>
												<td>{{ $answer->measure->qualification }} - {{ $answer->measure->alias }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						@endif
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<hr>
			<a class="btn btn-default" href="{{ route('home') }}"> <i class="fa fa-home"></i> Ir al panel principal</a>
		</div>
	</div>

@endsection