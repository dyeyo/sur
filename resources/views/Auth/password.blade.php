@extends('layouts.app')
@section('content')	
	<section class="login_box_area section_gap">
		<div class="container ">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="password_form_inner">
						<h3>Cambiar contraseña </h3>
						@if($errors->any())
        				@foreach($errors->all() as $err)
        				<p class="alert alert-danger">{{ $err }}</p>
        				@endforeach
        				@endif
						<form  action="{{route('password.action')}}" method="Post" >
							@csrf
						
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="old_password"  placeholder="contraseña anterior" >
								@error('old_password')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" name="new_password"  placeholder="Nueva Contrasena" >
								@error('new_password')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="new_password_confirm"  placeholder="Repita la contraseña" >
								@error('new_password_confirm')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							
							<div class="col-md-12 form-group">
								<button type="submit"  class="primary-btn">Cambiar contraseña</button>
								
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection