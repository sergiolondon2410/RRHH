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
	                                <th>Tipo</th>
	                                <th>Editar</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($competences as $competence)
		                            <tr class="odd gradeX">
		                                <td><a href="{{ url("/competencias/{$competence->id}") }}"><i class="fa fa-info-circle"></i></a> {{ $competence->name }}</td>
		                                <td>{{ $competence->description }}</td>
		                                <td>{{ $competence->competence_type->name }}</td>
		                                <td><a href="{{ route('competences.edit', ['competence' => $competence]) }}"><i class="fa fa-pencil"></i></a></td>
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
				<a class="btn btn-default" href="{{ route('competences.create') }}"> <i class="fa fa-plus-circle"></i> Nueva competencia</a>
			</div>
	    </div>
	</div>
@endsection