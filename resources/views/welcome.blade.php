@extends('layouts.app')
@section('content')
<section class="features-area section_gap">
  <div class="container">
    <h1 class="text-center">SUR TIENDA DE MAQUILLAJE</h1>
    <div class="row justify-content-md-center mt-4">
      <div class="col col-lg-6">
        <h3 class="text-center">Mision</h3>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
        </p>
      </div>
      <div class="col col-lg-6">
        <h3 class="text-center">Visión</h3>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, vero odit libero ex quos, nostrum blanditiis
          quia
          officiis harum adipisci quisquam rerum, saepe autem quibusdam praesentium perferendis accusamus vel non?
        </p>
      </div>
    </div>

    <div class="row features-inner mt-4">
      <!-- single features -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-features">
          <div class="f-icon">
            <img src="img/features/f-icon1.png" alt="">
          </div>
          <h6>Envio a todo Colombia</h6>
          <p>El pedido llega a puerta de tu casa</p>
        </div>
      </div>
      <!-- single features -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-features">
          <div class="f-icon">
            <img src="img/features/f-icon2.png" alt="">
          </div>
          <h6>Garantia</h6>
          <p>Tu producto esta asegurado</p>
        </div>
      </div>
      <!-- single features -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-features">
          <div class="f-icon">
            <img src="img/features/f-icon3.png" alt="">
          </div>
          <h6>Soporte 24/7</h6>
          <p>Atención permanente.</p>
        </div>
      </div>
      <!-- single features -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-features">
          <div class="f-icon">
            <h1>$</h1>
          </div>
          <h6>Pago seguro</h6>
          <p>Tu dinero esta asegurado</p>
        </div>
      </div>
    </div>
  </div>
</section>
@include('products.list')
<section class="exclusive-deal-area">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6 no-padding exclusive-left">
        <div class="row clock_sec clockdiv" id="clockdiv">
          <div class="col-lg-12">
            <h1>Exclusive Hot Deal Ends Soon!</h1>
            <p>Who are in extremely love with eco friendly system.</p>
          </div>
          <div class="col-lg-12">
            <div class="row clock-wrap">
              <div class="col clockinner1 clockinner">
                <h1 class="days">150</h1>
                <span class="smalltext">Days</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="hours">23</h1>
                <span class="smalltext">Hours</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="minutes">47</h1>
                <span class="smalltext">Mins</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="seconds">59</h1>
                <span class="smalltext">Secs</span>
              </div>
            </div>
          </div>
        </div>
        <a href="" class="primary-btn">Shop Now</a>
      </div>
      <div class="col-lg-6 no-padding exclusive-right">
        <div class="active-exclusive-product-slider">
          <!-- single exclusive carousel -->
          @foreach ($products as $item)
          <div class="single-exclusive-slider">
            <a href="{{route('Detalles',$item->id)}}">
              <img class="img-fluid" src="{{url('/img/product/')}}/{{$item->images[0]->image}}"
                alt="{{$item->images[0]->image}}">
            </a>
            <div class="product-details">
              <div class="price">
                <h6>${{$item->price}}</h6>
                <h6 class="l-through">$210.00</h6>
              </div>
              <a href="{{route('Detalles',$item->id)}}">
                <h4>{{$item->name}}</h4>
              </a>
              <div class="add-bag d-flex align-items-center justify-content-center">
                <form method="POST" onclick="addShopingCar('{{$item->id}}')">
                  {{method_field('POST')}}
                  {{csrf_field()}}
                  <a href="" class="primary-btn btn-sm btn-block"
                    style="height: auto;width: 14em;margin-right: -131px;">Añadir al carrito</a>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<section class="brand-area section_gap">
  <div class="container">
    <div class="row">
      <a class="col single-img" href="#">
        <img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
      </a>
      <a class="col single-img" href="#">
        <img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
      </a>
      <a class="col single-img" href="#">
        <img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
      </a>
      <a class="col single-img" href="#">
        <img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
      </a>
      <a class="col single-img" href="#">
        <img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
      </a>
    </div>
  </div>
</section>
@endsection