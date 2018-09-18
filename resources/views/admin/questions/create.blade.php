@extends('layout')

@section('title', "Nueva Pregunta")

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

    {!! Form::open(['url' => route('questions.store', ['evaluationtype' => $evaluationtype]), 'method' => 'POST'])  !!}
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nueva pregunta - {{$evaluationtype->name}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('competence', 'Competencia o Indicador:') !!} 
                                    {!! Form::select('competence', $competences, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('scale', 'Escala de medición:') !!} 
                                    {!! Form::select('scale', $scales, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('text', 'Pregunta:') !!}
									{!! Form::text('text', null, ['class' => 'form-control', 'value' => old('text')]) !!}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                            	{!! Form::submit('Crear pregunta', ['class' => 'form-control btn btn-default']) !!}
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
	{!! Form::close() !!}

	<p><a class="btn btn-default" href="{{ route('evaluationtypes.show', ['evaluationtype' => $evaluationtype]) }}"> <i class="fa fa-times"></i> Cancelar</a></p> 

@endsection