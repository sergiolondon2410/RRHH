@extends('layout')

@section('title', $title)

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

	{!! Form::model($evaluation, ['method' => 'POST', 'action' => ['EvaluationController@update', $evaluation]])  !!}
	 	@method('PUT')
		<div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar evaluación
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre:') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('description', 'Descripción:') !!}                           
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'value' => old('description')]) !!}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Editar evaluación', ['class' => 'form-control btn btn-default']) !!}
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

	<a class="btn btn-default" href="{{ route('evaluations.show', ['evaluation' => $evaluation]) }}"> <i class="fa fa-times"></i> Cancelar</a>

@endsection