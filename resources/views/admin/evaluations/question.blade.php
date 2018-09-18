@extends('layout')

@section('title', "Agregar preguntas")

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
					<h3><i class="fa fa-check-square-o"></i> Preguntas disponibles</h3>
					{!! Form::open(['url' => route('evaluationquestion.store', ['evaluation' => $evaluation]), 'method' => 'POST'])  !!}
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Seleccionar</th>
										<th>Pregunta</th>
										<th>Competencia</th>
										<th>Escala de evaluación</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($questions as $question)
										<tr class="odd gradeX">
											<td>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="preguntas[]" value="{{$question->id}}">
													</label>
												</div>
											</td>
											<td>{{ $question->text }}</td>
											<td>{{ $question->competence->name }}</td>
											<td>{{ $question->scale->name }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-lg-12">
							{!! Form::submit('Agregar preguntas', ['class' => 'form-control btn btn-default']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('evaluations.show', ['evaluation' => $evaluation]) }}"> <i class="fa fa-times"></i> Cancelar</a>
		</div>
	</div>


<!-- 	@if($errors->any())
		<div class="alert alert-danger">
			<h4>El formulario tiene los siguientes errores</h4>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif -->



@endsection