@extends('layout')

@section('title', "Crear Empresa")

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

	{!! Form::open(['url' => '/empresas/crear', 'method' => 'POST', 'files' => true, 'id' => 'my-dropzone' , 'class' => 'dropzone'])  !!}
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Información de la empresa
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            	<div class="row">
                            		<div class="col-lg-6">
                                        <div class="form-group">
											{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'value' => old('name')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">                             
                                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'value' => old('phone')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
											{!! Form::text('nit', null, ['class' => 'form-control', 'placeholder' => 'NIT', 'value' => old('nit')]) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::select('employee_num', [ '' => 'Cantidad de empleados', '5 - 20' => '5 - 20', '21 - 50' => '21 - 50', '51 - 100' => '51 - 100', '> 100' => 'Más de 100'], null, ['class' => 'form-control']) !!}
                                        </div>                                    
                                        <!-- <div class="form-group col-sm-6">
                                            <div id="drag">cargar</div>
                                        </div> -->
                                    </div>
                                    <div class="col-sm-6">
                                    	{!! Form::label('logo_url', 'Sube el logo de la empresa:') !!}
				                        {!! Form::file('logo_url', null, ['class' => 'filestyle']) !!}
				                    </div>
                                </div>    
                            </div>
                            <div class="form-group col-sm-12">
                            	{!! Form::submit('Crear Empresa', ['class' => 'form-control btn btn-default']) !!}
                                <!-- <button type="submit" class="btn btn-default">Guardar información</button> -->
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

	<p><a href="{{ url("/empresas")}}">Volver al listado</a></p>

@endsection