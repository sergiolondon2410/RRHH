@extends('layout')

@section('title', "Subida masiva")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Usuarios {{ $organization->name}}
				</div>
					<!-- /.panel-heading -->
				{!! Form::open(['url' => route('imports.store', ['organization' => $organization]), 'method' => 'POST'])  !!}
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr class="odd gradeX">
										<td>
											<input type="text" name="names" value="{{ $user['name'] }}">
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="form-group" style="margin-top: 20px">
							{!! Form::submit('Crear usuarios', ['class' => 'form-control btn btn-default']) !!}
						</div>
					</div>
				{!! Form::close() !!}
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

@endsection