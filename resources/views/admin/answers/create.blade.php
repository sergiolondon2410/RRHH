@extends('answerslayout')

@section('title', "Responder Pregunta")

@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			<h4>El formulario tiene los siguientes errores</h4>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="row">
		<div class="col-sm-10">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Escala de evaluación</h3>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="scale">
						<thead>
							<tr>
								<th>Valor</th>
								<th>Significado</th>
								<th>Explicación</th>
							</tr>
						</thead>
						<tbody>
							@foreach($question->scale->measures as $measure)
								<tr class="odd gradeX">
									<td>{{ $measure->qualification }}</td>
									<td>{{ $measure->alias }}</td>
									<td>{{ $measure->description }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>{{ $question->competence->competence_type->name }}:</strong> {{ $question->competence->name }}</h3>
				</div>
				{!! Form::open(['url' => route('answers.store', ['application' => $application, 'question' => $question, 'contador' => $contador]), 'method' => 'POST'])  !!}
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-5">
								<p><strong>{{ $question->text }}</strong></p>
							</div>
							<div class="col-sm-4">
								<div class="row">
									@foreach($measures as $measure => $qualification)
										<div class="col-sm-3">			
											<div class="form-group">
												<label><input type="radio" value="{{ $measure }}" name="measure[]"> {{ $qualification }}</label>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="col-sm-3">
								{!! Form::submit('Próxima pregunta >>', ['class' => 'form-control btn btn-danger']) !!}
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="row">
				<div class="col-sm-12 centrado" >
					<h4>Pregunta {{ $contador+1 }} de {{ $total }} - Avance: {{ $percent }}%</h4>
				</div>
				<div class="col-sm-12">
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percent }}%;">
							{{ $percent }}%
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection