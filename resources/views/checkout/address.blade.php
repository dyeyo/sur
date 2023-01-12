@extends('layouts.app')

@section('content')

<section class="cart_area" style="margin-top: 100px">
    <div class="container">
        <div class="cart_inner">
            <div class="container">

                <section id="cart">
                    <h2>Datos de Facturación</h2>
                    <form method="POST" action="{{ route('billingAddress.store') }}">
                        <input type="hidden" name="redirectAction" value="{{ $action }}">
                        <pre>
                            {{ $errors }}
                        </pre>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Dirección 1 *</label>
                            <input type="text" class="form-control" id="name" name="street" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Dirección 2</label>
                            <input type="text" class="form-control" id="name" name="second_street" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Ciudad *</label>
                            <input type="text" class="form-control" id="name" name="city" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="name" name="state" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">País *</label>
                            <select class="form-select" name="country" id="">
                                <option>-Seleccione-</option>
                                <option value="CO">Colombia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="name" name="postal_code" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="name" name="phone" aria-describedby="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Dirección</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>

@endsection
