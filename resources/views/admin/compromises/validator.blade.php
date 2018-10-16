@extends('layout')

@section('title', $title)

@section('content')
	<div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $title }}
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						{!! Form::open(['url' => route('compromises.create', ['user' => $user]), 'method' => 'POST', 'files' => true]) !!}
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Elegir</th>
										<th>Usuario</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($validators as $validator)
										<tr class="odd gradeX">
											<td><input type="radio" value="{{ $validator->id }}" name="validator[]" required></td>
											<td>{{ $validator->name }} {{ $validator->last_name }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							{!! Form::submit('Continuar', ['class' => 'form-control btn btn-default']) !!}
						{!! Form::close() !!}
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
	</div>
	<p><a class="btn btn-default" href="{{ route('compromises.organization') }}"> <i class="fa fa-times"></i> Cancelar</a></p>
	<hr>
@endsection