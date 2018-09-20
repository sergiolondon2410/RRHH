@extends('layout')

@section('title', "Asignar Evaluadores")

@section('content')
	
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $user->name }} {{ $user->last_name }}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h4><strong>Evaluación:</strong> {{ $evaluation->name }}</h4>
					<p><strong>Tipo de evaluación:</strong>  {{ $evaluation->evaluation_type->name }} <i>{{ $evaluation->evaluation_type->description }}</i></p>
					<hr>
					<h3><i class="fa fa-users"></i> Heteroevaluadores</h3>
					{!! Form::open(['url' => route('applications.store', ['user' => $user, 'evaluation' => $evaluation]), 'method' => 'POST'])  !!}
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Seleccionar</th>
										<th>Evaluador</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($mates as $mate)
										<tr class="odd gradeX">
											<td>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="evaluadores[]" value="{{$mate->id}}">
													</label>
												</div>
											</td>
											<td>{{ $mate->name }} {{ $mate->last_name }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-lg-12">
							{!! Form::submit('Agregar evaluadores', ['class' => 'form-control btn btn-default']) !!}
						</div>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
			{!! Form::close() !!}
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('evaluations.show', ['evaluation' => $evaluation]) }}"> <i class="fa fa-times"></i> Cancelar</a>
		</div>
	</div>

@endsection