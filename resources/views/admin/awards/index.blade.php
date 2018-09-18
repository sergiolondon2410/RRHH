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
	                                <th>Creado por</th>
	                                <th>Empresa</th>
	                                <th>Imagen</th>
	                                <th>Editar</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach ($awards as $award)
		                            <tr class="odd gradeX">
		                                <td><a href="{{ route('awards.show', ['award' => $award]) }}"><i class="fa fa-info-circle"></i></a> {{ $award->name }}</td>
		                                <td>{{ $award->description }}</td>
		                                <td>{{ $award->creator->name }} {{ $award->creator->last_name }}</td>
		                                <td>{{ $award->organization->name }}</td>
		                                <td>
		                                	<img src="{{ asset('/storage') }}{{$award->resource->uri}}" height="100em">
		                                </td>
		                                <td>
		                                	@if($award->creator_id == Auth::user()->id)
		                                		<a href="{{ route('awards.edit', ['award' => $award]) }}"><i class="fa fa-pencil"></i></a>
		                                	@endif
		                                </td>
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
				<a class="btn btn-default" href="{{ route('awards.create') }}"> <i class="fa fa-plus-circle"></i> Nuevo Premio</a>
			</div>
	    </div>
	    
	</div>
@endsection