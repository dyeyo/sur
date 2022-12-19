<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
@include('layouts.header')
	<section class="login_box_area section_gap">
		<div class="container ">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="register_form_inner">
						<h3>register </h3>
						@if($errors->any())
        				@foreach($errors->all() as $err)
        				<p class="alert alert-danger">{{ $err }}</p>
        				@endforeach
        				@endif
						<form class="row register_form" action="{{route('register.verify')}}" method="Post" id="registerForm" >
							@csrf
						<div class="col-md-12 form-group">
								<input type="text"  class="form-control" name="name" placeholder="name" value="{{ old('name')}}" >
								@error('name')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="lastname" placeholder="Lastname" value="{{ old('lastname')}}">
								@error('lastname')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="city" placeholder="city"  value="{{ old('city')}}">
								@error('city')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="address"  placeholder="address"  value="{{ old('address')}}" >
								@error('address')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" name="phone"  placeholder="phone" value="{{ old('phone')}}">
								@error('phone')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="number" class="form-control" name="identification" placeholder="identification" value="{{ old('identification')}}"  >
								@error('identification')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email"  placeholder="email"  value="{{ old('email')}}" >
								@error('email')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="Password"  placeholder="Password" >
								@error('password')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password_confirm"  placeholder="password_confirm" >
								@error('password_confirm')
								<small class="text-danger mt-1">
									<strong>{{$message}}</strong>
								</small>
								@enderror
							</div>
							
							<div class="col-md-12 form-group">
								<button  class="primary-btn">Register</button>
								<a href="{{route('password')}}">Forgot Password?</a>
								<a href="{{route('login')}}">login</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@extends('layouts.footer')

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
