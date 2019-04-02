@extends('layout')

@section('title', "Imports")

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">CSV Import</div>

					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('imports.import_file') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="organization" class="col-md-4 control-label">Empresa</label>
								<div class="col-lg-6">
									{!! Form::select('organization', $organizations, null, ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								<label for="csv_file" class="col-md-4 control-label">Archivo CSV</label>

								<div class="col-md-6">
									<input id="csv_file" type="file" class="form-control" name="csv_file" required>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Subir archivo
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection