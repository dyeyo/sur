<div class="container">
  <div class="row">
    <!-- single product -->
    @foreach ($products as $item)
    <div class="col-lg-4 col-sm-12">
      <div class="single-product">
        <a href="{{route('Detalles',$item->id)}}">
          <img class="img-fluid" src="{{url('/img/product/')}}/{{$item->images[0]->image}}"
            alt="{{$item->images[0]->image}}">
          <div class="product-details">
            <h6>{{$item->name}}</h6>
            <div class="price">
              <h6>${{$item->price}}</h6>
              <h6 class="l-through">${{$item->price+(19/100)}}</h6>
            </div>
            <div class="prd-bottom">
              <span class="social-info">
                <form method="POST">
                  {{method_field('POST')}}
                  {{csrf_field()}}
                  <button class="btn-link social-info" onclick="addShopingCar('{{$item->id}}')">
                    <span class="ti-bag"></span>
                    <p class="hover-text">Añadir</p>
                  </button>
                </form>
              </span>
              <a href="{{route('Detalles',$item->id)}}" class="social-info">
                <span class="lnr lnr-move"></span>
                <p class="hover-text">Ver detalles</p>
              </a>
            </div>
          </div>
        </a>

      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  function addShopingCar(product) {
    event.preventDefault()
    let token = document.querySelector('input[name=_token]').value
    let data = {
      id: product,
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