@extends('layout')

@section('title', "Evaluación")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluation->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h4><strong>Descripción:</strong> {{ $evaluation->description }}</h4>
					<p><strong>Tipo de evaluación:</strong>  {{ $evaluation->evaluation_type->name }} <i>{{ $evaluation->evaluation_type->description }}</i></p>
					<p><strong>Proceso:</strong>  {{ $evaluation->process->name }}</p>
					<p><strong>Empresa:</strong>  {{ $evaluation->process->organization->name }}</p>
					<a class="btn btn-default" href="{{ route('evaluations.edit', ['evaluation' => $evaluation]) }}"> <i class="fa fa-pencil"></i> Editar evaluación</a>
					<hr>
					<h3><i class="fa fa-check-square-o"></i> Preguntas en esta evaluación</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Pregunta</th>
								<th>Competencia</th>
								<th>Escala de evaluación</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($evaluation->questions as $question)
								<tr class="odd gradeX">
									<td>{{ $question->text }}</td>
									<td>{{ $question->competence->name }}</td>
									<td>{{ $question->scale->name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('evaluationquestion.create', ['evaluation' => $evaluation]) }}"> <i class="fa fa-plus-circle"></i> Agregar pregunta</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('processes.show', ['process' => $evaluation->process]) }}"> <i class="fa fa-angle-double-left"></i> Volver al proceso</a>
		</div>
	</div>

@endsection