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
									<th>Insignia</th>
									<th>Reconocimiento</th>
									<th>Otorgado a</th>
									<th>Observación</th>
									<th>Otorgado por</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($accomplishments as $accomplishment)
									<tr class="odd gradeX">
										<td>
											<img src="{{ asset('/storage') }}{{$accomplishment->award->resource->uri}}" height="100em">
										</td>
										<td>
											<a href="{{ route('accomplishments.show', ['accomplishment' => $accomplishment]) }}"><i class="fa fa-info-circle"></i></a> {{ $accomplishment->award->name }} 
										</td>
										<td>{{ $accomplishment->user->name }} {{ $accomplishment->user->last_name }}</td>
										<td>{{ $accomplishment->observation }}</td>
										<td>{{ $accomplishment->giver->name }} {{ $accomplishment->giver->last_name }}</td>
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
				<a class="btn btn-default" href="{{ route('accomplishments.create') }}"> <i class="fa fa-plus-circle"></i> Otorgar reconocimiento</a>
			</div>
		</div>
	</div>
@endsection