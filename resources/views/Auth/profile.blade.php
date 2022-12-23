@extends('layouts.app')
@section('content')	
	<section class="login_box_area section_gap">
		<div class="container ">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						 @if(session('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
        				@endif
       					 @if($errors->any())
       					 @foreach($errors->all() as $err)
      					<p class="alert alert-danger">{{ $err }}</p>
      				    @endforeach
      					@endif
						<h3>Actualizar datos personales</h3>
						
						<form  class="row login_form" action="{{route('profile.update',$user->id)}}" method="post"  >
								@csrf
								@method('put')
								<div class="col-md-12 form-group">
								<input type="text"  class="form-control" name="name" placeholder="Nombres" value="{{ $user->name}}" >
								@error('name')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
						</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="lastname" placeholder="Apellidos" value="{{$user->lastname}}">
								@error('lastname')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="city" placeholder="Ciudad"  value="{{$user->city}}">
								@error('city')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="address"  placeholder="Direccion"  value="{{$user->address}}" >
								@error('address')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="phone"  placeholder=" Numero de Celular" value="{{$user->phone}}">
								@error('phone')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="identification" placeholder="Identificacion" value="{{$user->identification}}"  >
								@error('identification')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email"  placeholder="Correo electronico"  value="{{$user->email, old('email')}}" >
								@error('email')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<button  class="primary-btn">Actualizar</button>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	@endsection
