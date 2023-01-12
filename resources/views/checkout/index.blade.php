@extends('layouts.app')
@section('content')

<section class="cart_area" style="margin-top: 100px">
    <div class="container">
        <div class="cart_inner">
            <div class="container">

                <section id="cart">
                    <h2>Datos de pago</h2>
                    <form method="POST" action="{{ route('checkout.store', $shoppingCart->id) }}">
                        <pre>
                            {{ $errors }}
                        </pre>
                        <input type="hidden" name="deviceSessionId" value="{{ $deviceId }}">
                        @csrf
                        <p>Datos de Envio</p>
                        <div class="mb-3">
                            <label class="form-label" for="">Dirección 1 *</label>
                            <input type="text" class="form-control" id="street" name="street" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Dirección 2 *</label>
                            <input type="text" class="form-control" id="second_street" name="second_street" aria-describedby="second_street">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Ciudad *</label>
                            <input type="text" class="form-control" id="city" name="city" aria-describedby="city">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Estado *</label>
                            <input type="text" class="form-control" id="state" name="state" aria-describedby="state">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">País *</label>
                            <select class="form-select" name="country" id="country">
                                <option>-Seleccione-</option>
                                <option value="CO">Colombia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Código Postal *</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Teléfono *</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Banco *</label>
                            <select class="form-select" name="bank_code" id="bank_code">
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->pseCode }}">{{ $bank->description }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_code') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del titular *</label>
                            <input type="text" class="form-control" id="name" name="complete_name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Tipo de persona *</label>
                            <select class="form-select" name="person_type" id="">
                                <option>-Seleccione-</option>
                                <option value="N">Natural</option>
                                <option value="J">Jurídica</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Tipo de identificación *</label>
                            <select class="form-select" name="identification_type" id="">
                                <option>-Seleccione-</option>
                                <option value="CC">CC - Cédula de ciudadanía.</option>
                                <option value="CE">CE - Cédula de extranjería.</option>
                                <option value="NIT">NIT - Número de Identificación Tributaria (Empresas).</option>
                                <option value="TI">TI - Tarjeta de identidad.</option>
                                <option value="PP">PP - Pasaporte.</option>
                                <option value="IDC">IDC - Identificador único de cliente, para el caso de ID's únicos de clientes/usuarios de servicios públicos.</option>
                                <option value="CEL">CEL - En caso de identificarse a través de la línea del móvil.</option>
                                <option value="RC">RC - Registro civil de nacimiento.</option>
                                <option value="DE">DE - Documento de identificación extranjero.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Número de documento *</label>
                            <input type="text" class="form-control" name="document_number" aria-describedby="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://maf.pagosonline.net/ws/fp/tags.js?id={{ $deviceId }}"></script>
<noscript>
	<iframe style="width: 100px; height: 100px; border: 0; position: absolute; top: -5000px;" src="https://maf.pagosonline.net/ws/fp/tags.js?id={{ $deviceId }}"></iframe>
</noscript>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

});
</script>
