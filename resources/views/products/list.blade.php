<div class="container">
  <div class="row">
    <!-- single product -->
    @foreach ($products as $item)
    <div class="col-lg-4 col-sm-12">
      <div class="single-product">
        <a href="{{route('Detalles',$item->id)}}">
              <img class="img-fluid" src="{{url('/img/product/')}}/{{$item->images[0]->image}}" alt="{{$item->images[0]->image}}">
          <div class="product-details">
            <h6>{{$item->name}}</h6>
            <div class="price">
              <h6>${{$item->price}}</h6>
              <h6 class="l-through">${{$item->price+(19/100)}}</h6>
            </div>
            <div class="prd-bottom">
              <a href="{{route('add-shoping',$item->id)}}" class="social-info">
                <span class="ti-bag"></span>
                <p class="hover-text">Añadir</p>
              </a>
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