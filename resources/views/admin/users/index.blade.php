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
									<th>Correo</th>
									<th>Documento</th>
									<th>Empresa</th>
									<th>Tipo</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr class="odd gradeX">
										<td>
											<a href="{{ route('users.show', ['id' => $user->id]) }}"><i class="fa fa-info-circle"></i></a> {{ $user->name }} {{ $user->last_name }}
										</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->document }}</td>
										<td>{{ $user->organization->name }}</td>
										<td>{{ $user->user_type->name }}</td>
										<td>
											{!! Form::model($user, ['method' => 'POST', 'action' => ['UserController@destroy', $user->id],  'files' => true])  !!}
												@method('DELETE')
												<input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('Está seguro de eliminar al usuario {{ $user->name }} {{ $user->last_name }}? ')">
											{!! Form::close() !!}
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
		</div>
	</div>
@endsection