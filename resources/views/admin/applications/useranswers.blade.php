@extends('layout')

@section('title', "Respuestas evaluado")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Respuestas {{ $evaluation->name }} - Evaluado:  {{ $user->full_name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Competencia</th>
								<th>Pregunta</th>
								<th>Autoevaluación</th>
								<th>Heteroevaluación</th>
							</tr>
						</thead>
						<tbody>
							@foreach($answers as $answer)
								<tr class="odd gradeX">
									<td>{{ $answer["competence"] }}</td>
									<td>{{ $answer["text"] }}</td>
									<td>{{ $answer["value"] }}</td>
									<td>{{ $answer["heteroevaluation"] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
				<!-- /.panel -->
		</div>
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('applications.usercomputation', ['user' => $user, 'evaluation' => $evaluation]) }}"> <i class="fa fa-angle-double-left"></i> Volver</a>
		</div>
	</div>
	<hr>
@endsection

