@extends('layouts.app')
@section('content')

<div class="product_image_area">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="s_Product_carousel">
          @foreach ($product->images as $img )
          <div class="single-prd-item">
            <img class="img-fluid" src="{{url('/img/product/')}}/{{$img->image}}" alt="{{$img->image}}">
          </div>
          @endforeach

        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3>{{$product->name}}</h3>
          <h2>${{$product->price}}</h2>
          <ul class="list">
            <li><a class="active" href="#"><span>Categoria</span> : Belleza</a></li>
            <li><a href="#"><span>Disponibilidad</span> : {{$product->stock}}</a></li>
          </ul>
          <p>{{$product->description}}</p>
          <div class="product_count">
            <label for="qty">Cantidad:</label>
            <input type="text" name="qty" id="cantidad" maxlength="12" value="1" title="Quantity:"
              class="input-text qty">
            <button
              onclick="var result = document.getElementById('cantidad'); var cantidad = result.value; if( !isNaN( cantidad )) result.value++;return false;"
              class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
          </div>
          <div class="card_area d-flex align-items-center">
            <form method="POST">
              {{method_field('POST')}}
              {{csrf_field()}}
              <button class="primary-btn" onclick="addShopingCar('{{$product->id}}')">Añadir al carrito</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
          aria-selected="true">Descripción</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
          aria-selected="false">Reviews</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>{{$product->description}}</p>
      </div>
      <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-12">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>Puntaje</h5>
                  <h4>4.0</h4>
                  <h6>(03 Reviews)</h6>
                </div>
              </div>

            </div>
            <div class="review_list mt-5">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-1.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-2.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-3.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea
                  commodo</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
<!--================End Product Description Area =================-->

<script>
  function addShopingCar(product) {
    event.preventDefault()
    let token = document.querySelector('input[name=_token]').value
    let quantity = document.getElementById('cantidad').value
    let data = {
      id: product,
      quantity,
    };
    fetch(`http://127.0.0.1:8000/anadir/`, {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
      }
    })
      .then(response => response.json())
      .then(async sys => {
        console.log(sys);
        if (sys.message == 'El producto ya existe en el carrito.') {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
              popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
          })
          await Toast.fire({
            icon: 'error',
            title: sys.message
          })
          return;
        }
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
            popup: 'colored-toast'
          },
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true
        })
        await Toast.fire({
          icon: 'success',
          title: 'Produto añadido'
        })
      })
      .catch(err => {
        console.log(sys);
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
            popup: 'colored-toast'
          },
          showConfirmButton: false,
          timer: 2500,
          timerProgressBar: true
        })
        Toast.fire({
          icon: 'error',
          title: 'Algo va mal, vuelve a intentarlo'
        })
      })
  }
</script>