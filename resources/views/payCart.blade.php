@extends('layouts.template')
@extends('layouts.nav')
@section('title', 'Pago')

@section('content')
    <body class="bg-light">
        <div class="container d-flex justify-content-center">
            <div class="w-75 rounded bg-white shadow p-4">
                <div>
                    <h2 class="text-center"></h2>
                    <h5>Monto a pagar:</h5>
                    <p class="alert alert-primary text-primary">$ {{ number_format($price, 0, ',', '.') }}</p>
                </div>

                <div>
                    <p class="mb-4">Seleccione un método de pago</p>

                    <ul>
                        <li style="list-style: none;">
                            <form action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" method="post">
                                <input name="merchantId"    type="hidden"  value="{{config('services.payu.merchant_id')}}">
                                <input name="accountId"     type="hidden"  value="{{config('services.payu.account_id')}}">
                                <input name="description"   type="hidden"  value="Productos Memoria Todo Color">
                                <input name="referenceCode" type="hidden"  value="{{$payU['referenceCode'] }}">
                                <input name="amount"        type="hidden"  value="{{$price}}">
                                <input name="tax"           type="hidden"  value="0">
                                <input name="taxReturnBase" type="hidden"  value="0">
                                <input name="currency"      type="hidden"  value="{{config('services.payu.currency')}}">
                                <input name="signature"     type="hidden"  value="{{$payU['signature'] }}">
                                <input name="test"          type="hidden"  value="1">
                                <input name="buyerEmail"    type="hidden"  value="prueb@gmail.com">
                                <input name="responseUrl"   type="hidden"  value="{{ route('thanks') }}?pasarela=payu">
                                <input name="confirmationUrl" type="hidden"  value="{{route('paid.payu') }}">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-secondary w-75 rounded shadow">
                                        <img src="https://chile.payu.com/wp-content/uploads/sites/4/2020/05/PAYU_LOGO_LIME.png" class="w-25">
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
@endsection
