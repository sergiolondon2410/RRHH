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
	                                <th>Tipo</th>
	                                <th>Descripción</th>
	                                <th>Editar</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($scales as $scale)
		                            <tr class="odd gradeX">
		                                <td><a href="{{ route('scales.show', ['scale' => $scale]) }}"><i class="fa fa-info-circle"></i></a> {{ $scale->name }}</td>
		                                <td>{{ $scale->type }}</td>
		                                <td>{{ $scale->description }}</td>
		                                <td><a href="{{ route('scales.edit', ['scale' => $scale]) }}"><i class="fa fa-pencil"></i></a></td>
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
				<a class="btn btn-default" href="{{ route('scales.create') }}"> <i class="fa fa-plus-circle"></i> Nueva escala</a>
			</div>
	    </div>
	    
	</div>
@endsection