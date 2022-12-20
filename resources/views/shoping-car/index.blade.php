@extends('layouts.app')
@section('content')
<section class="cart_area">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($myCar as $car)
            <tr>
              <td style="width: 10em;">
                <div class="media">
                  <div class="d-flex">
                    <img src="{{url('/img/product/')}}/{{$car->product->images[0]->image}}" alt="">
                  </div>
                  <div class="media-body">
                    <p>{{$car->product->name}} </p>
                  </div>
                </div>
              </td>
              <td style="width: 10em;">
                <h5>${{$car->product->price}} </h5>
              </td>
              <td style="width: 10em;">
                <div class="product_count">
                  <input type="text" name="{{$car->product->name}}" id="{{$car->product->name}}" maxlength=""
                    value="{{$car->quantity}}" title="Quantity:" class="input-text qty">
                  <button onclick="addQuantity('{{$car->product->stock}}','{{$car->product->name}}')"
                    class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                  <button onclick="restQuantity()" class="reduced items-count" type="button"><i
                      class="lnr lnr-chevron-down"></i></button>
                </div>
              </td>
              <td style="width: 6em;">
                <h5>$
                  <input type="text" name="total" id="total" value="{{$car->product->price * $car->quantity}} ">
                </h5>
              </td>
            </tr>
            @endforeach
            <tr>
              <td>

              </td>
              <td>

              </td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>$2160.00</h5>
              </td>
            </tr>
            <tr>
              <td>

              </td>
              <td>

              </td>
              <td>
                <h5>Total</h5>
              </td>
              <td>
                <h5>$
                  <input type="text" name="total" id="total" value="">
                </h5>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
<script>
  function addQuantity(limit, name) {


    let result = document.getElementById(name);
    let sst = result.value;
    if (!isNaN(sst) && limit > sst) result.value++;
    return false;
  }

  function restQuantity() {
    let result = document.getElementById('sst');
    let sst = result.value;
    if (!isNaN(sst) && sst > 0) result.value--; return false;
  }
</script>