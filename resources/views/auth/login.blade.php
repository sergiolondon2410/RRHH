@extends('layouts.app')

@section('content')

	<div class="header_logo">
		<div>
			<img src="{{ asset('/images/logo.jpg') }}">
		</div>
	</div>
	<div class="wrapper2">
		<div class="container">
			<h1>Bienvenidos!</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
			<form class="form" method="POST" action="{{ route('login') }}">
				@csrf
				
				<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
					<span class="invalid-feedback">
						strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
				
				<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
				@if ($errors->has('password'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
				<button type="submit" id="login-button">Ingresar</button>
			</form>
		</div>
		
		<ul class="bg-bubbles2">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

	<div class="footer">
		<p><strogn>Gente OK&#174; - 2018</strogn> Desarrollado por Azytana </p>
	</div>

@endsection