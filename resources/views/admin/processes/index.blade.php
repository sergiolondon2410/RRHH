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
	                                <th>Descripción</th>
	                                <th>Empresa</th>
	                                <th>Estado</th>
	                                <th>Editar</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($processes as $process)
		                            <tr class="odd gradeX">
		                                <td><a href="{{ route('processes.show', ['process' => $process]) }}"><i class="fa fa-info-circle"></i></a> {{ $process->name }}</td>
		                                <td>{{ $process->description }}</td>
		                                <td>{{ $process->organization->name }}</td>
		                                <td>{{ $process->status }}</td>
		                                <td><a href="{{ route('processes.edit', ['process' => $process]) }}"><i class="fa fa-pencil"></i></a></td>
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
	        <div class="col-lg-12">
				<a class="btn btn-default" href="{{ route('processes.create') }}"> <i class="fa fa-plus-circle"></i> Nuevo Proceso</a>
			</div>
	    </div>
	    
	</div>
@endsection