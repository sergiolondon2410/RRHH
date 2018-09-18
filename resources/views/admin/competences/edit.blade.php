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

	{!! Form::model($competence, ['method' => 'POST', 'action' => ['CompetenceController@update', $competence],  'files' => true])  !!}
	 	@method('PUT')
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar competencia
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                            	<div class="row">
                            		<div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Competencia:') !!}
											{!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('type', 'Tipo:') !!} 
                                            {!! Form::select('type', $types, $competence->competence_type_id, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('color', 'Color:') !!} 
                                            {!! Form::select('color', $color, $competence->color, ['class' => 'form-control']) !!}
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
                            	{!! Form::submit('Editar competencia', ['class' => 'form-control btn btn-default']) !!}
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

	<a class="btn btn-default" href="{{ route('competences.index') }}"> <i class="fa fa-times"></i> Cancelar</a>

@endsection