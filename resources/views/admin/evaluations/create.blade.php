@extends('layout')

@section('title', "Nueva Evaluación")

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

    {!! Form::open(['url' => route('evaluations.store', ['process' => $process]), 'method' => 'POST'])  !!}
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Información de la evaluación
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                            	<div class="row">
                            		<div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Nombre de la Evaluación:') !!}
											{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('type', 'Tipo de evaluación:') !!} 
                                            {!! Form::select('type', $evaluationtypes, null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('description', 'Descripción:') !!}                           
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                            	{!! Form::submit('Crear Evaluación', ['class' => 'form-control btn btn-default']) !!}
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

    <p><a class="btn btn-default" href="{{ route('processes.show', ['process' => $process]) }}"> <i class="fa fa-times"></i> Cancelar</a></p> 

@endsection