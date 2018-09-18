@extends('layout')

@section('title', "Tipo de evaluación")

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $evaluationtype->name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h4>{{ $evaluationtype->description }}</h4>
					
					<a class="btn btn-default" href="{{ route('evaluationtypes.edit', ['evaluationtype' => $evaluationtype]) }}"> <i class="fa fa-pencil"></i> Editar tipo de evaluación</a>
					<hr>
					<h3><i class="fa fa-shopping-basket"></i> Almacén de preguntas</h3>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Pregunta</th>
								<th>Competencia</th>
								<th>Escala de evaluación</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($questions as $question)
								<tr class="odd gradeX">
									<td>{{ $question->text }}</td>
									<td>{{ $question->competence->name }}</td>
									<td>{{ $question->scale->name }}</td>
									<td>
										<a href="{{ route('questions.edit', ['question' => $question]) }}"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<a class="btn btn-default" href="{{ route('questions.create', ['evaluationtype' => $evaluationtype]) }}"> <i class="fa fa-plus-circle"></i> Nueva pregunta</a>
				</div>
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('evaluationtypes.index') }}"> <i class="fa fa-angle-double-left"></i> Volver al listado</a>
		</div>
	</div>

@endsection