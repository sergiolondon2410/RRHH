@extends('layout')

@section('title', "Empresa")

@section('content')
	
	<div class="row">
	        <div class="col-lg-9">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	{{ $organization->name }}
	            	</div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                	<div class="row">
	                		<div class="col-lg-4">
								<p><strong>NIT:</strong>  {{ $organization->taxes_id }} </p>
								<p><strong>Teléfono:</strong>  {{ $organization->phone }} </p>
								<p><strong>Número de empleados:</strong>  {{ $organization->employee_quantity }}</p>
							</div>
							<div class="col-lg-4">
								<img src="{{ asset('/storage') }}/{{$organization->logo_url}}" height="100em">
							</div>
						</div>
	                </div>
	                <!-- /.panel-body -->
	            </div>
	            <!-- /.panel -->
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>
	<p><a href="{{ url("/empresas")}}">Volver al listado</a></p>

@endsection