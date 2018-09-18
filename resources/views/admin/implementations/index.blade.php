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
	                                <th>Evaluación</th>
	                                <th>Acción</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($implementations as $implementation)
		                            <tr class="odd gradeX">
		                            	<td>{{ $implementation->evaluation->name }}</td>
		                                <td><a href="{{ url("/aplicacion/nuevo/{$implementation->id}") }}">Responder</a></td>
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