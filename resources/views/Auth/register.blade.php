@extends('layouts.app')
@section('content')	
	<section class="login_box_area section_gap">
		<div class="container ">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>ya tienes una cuenta ?</h4>
							<a class="primary-btn" href="{{route('login')}}">iniciar sesion</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>registrate</h3>
						 <form  class="row login_form" action="{{route('register.verify')}}" method="Post"  novalidate="novalidate">
								@csrf
								<div class="col-md-12 form-group">
								<input type="text"  class="form-control" name="name" placeholder="Nombres" value="{{ old('name')}}" >
								@error('name')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
						</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="lastname" placeholder="Apellidos" value="{{ old('lastname')}}">
								@error('lastname')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="city" placeholder="Ciudad"  value="{{ old('city')}}">
								@error('city')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="address"  placeholder="Direccion"  value="{{ old('address')}}" >
								@error('address')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="phone"  placeholder=" Numero de Celular" value="{{ old('phone')}}">
								@error('phone')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="identification" placeholder="Identificacion" value="{{ old('identification')}}"  >
								@error('identification')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email"  placeholder="Correo electronico"  value="{{ old('email')}}" >
								@error('email')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password"  placeholder="Contraseña" >
								@error('password')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password_confirm"  placeholder="Confirmar Contraseña" >
								@error('password_confirm')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							
							<div class="col-md-12 form-group">
								<button  class="primary-btn">Registrate</button>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	@endsection
