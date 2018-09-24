@extends('layout')

@section('title', "Responder Pregunta")

@section('content')

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
				  		<h3 class="panel-title"><strong>Competencia:</strong> {{ $question->competence->name }}</h3>
					</div>
					{!! Form::open(['url' => route('answers.store', ['application' => $application, 'question' => $question, 'count' => $contador]), 'method' => 'POST'])  !!}
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<p><strong>{{ $question->text }}</strong></p>
							</div>
							<div class="col-sm-2">
								{!! Form::select('measure', $measures, null, ['class' => 'form-control']) !!}
							</div>
							<div class="col-sm-4">
								{!! Form::submit('Próxima pregunta >>', ['class' => 'form-control btn btn-danger']) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

@endsection