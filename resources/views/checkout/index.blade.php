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
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Banco *</label>
                            <select class="form-select" name="bank_code" id="">
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

});
</script>
