@extends('layout')

@section('title', $title)

@section('content')
	<div>
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                        <div class="panel-heading">
	                    {{ $title }}
	            </div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th>Nombre</th>
	                                <th>Número de empleados</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($organizations as $organization)
		                            <tr class="odd gradeX">
		                                <td><a href="{{ url("/empresas/{$organization->id}") }}">{{ $organization->name }}</a></td>
		                                <td>{{ $organization->employee_quantity }}</td>
		                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	                <!-- /.panel-body -->
	            </div>
	            <!-- /.panel -->
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>
	</div>
@endsection