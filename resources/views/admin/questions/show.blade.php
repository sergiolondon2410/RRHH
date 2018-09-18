@extends('layout')

@section('title', "Competencia")

@section('content')
	
	<div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	{{ $competence->name }}
	            	</div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
						<h4>{{ $competence->description }}</h4>
						<p><strong>Tipo:</strong>  {{ $competence->competence_type->name }}</p>
						<p><strong>Evaluación:</strong>  {{ $competence->evaluation->name }} <i>{{ $competence->evaluation->description }}</i></p>
						<p><div style=" height: 2em; width: 2em; background-color: {{ $competence->color }}"></div></p>
						<hr>

	                	<h3>Preguntas en esta competencia</h3>
	                    <table width="100%" class="table table-striped table-bordered table-hover">
	                        <thead>
	                            <tr>
	                                <th>Preguntas</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($questions as $question)
		                            <tr class="odd gradeX">
		                                <td>{{ $question->text }}</td>
		                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	                <!-- /.panel-body -->
	                <button type="button" class="btn btn-default"><a href="{{ url("/competencias/nuevo/$competence->id")}}">Nueva pregunta</a></button>
	               
	            </div>
	            <!-- /.panel -->
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>
	<p><a href="{{ url("/preguntas")}}">Volver al listado</a></p>

@endsection