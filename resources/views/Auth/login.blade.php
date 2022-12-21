@extends('layouts.app')
@section('content')

<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="img/login.jpg" alt="">
					<div class="hover">
						<h4>Nuevo en nuestro sitio web?</h4>
						<p>Registrate para conocer mas ofertas y productos</p>
						<a class="primary-btn" href="{{route('register')}}">crea una cuenta</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Iniciar Sesion</h3>
					@if(session('success'))
					<p class="alert alert-success">{{ session('success') }}</p>
					@endif
					@if($errors->any())
					@foreach($errors->all() as $err)
					<p class="alert alert-danger">{{ $err }}</p>
					@endforeach
					@endif
					<form action="{{route('login.verify')}}" method="POST">
						@csrf
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Correo electronico"
								value="{{ old('email') }}">
							@error('email')
							<small class="text-danger mt-1">
								<strong>{{$message}}</strong>
							</small>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="password" placeholder="Contraseña">
							@error('password')
							<small class="text-danger mt-1">
								<strong>{{$message}}</strong>
							</small>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Iniciar sesion</button>
							<div class="mt-3 text-center">
								<a href="">Olvido su contraseña?</a>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection