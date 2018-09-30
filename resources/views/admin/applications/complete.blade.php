@extends('layout')

@section('title', "Evaluación completa")

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h3>Felicitaciones {{ $application->evaluator->name }} has completado la evaluación</h3>
			<img src="{{ asset('/images/EndEval.png') }}" height="400em">
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<a class="btn btn-default" href="{{ route('home') }}"> <i class="fa fa-home"></i> Ir al panel principal</a>
		</div>
	</div>

@endsection