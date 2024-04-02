@extends('layouts.template')
@extends('layouts.nav')
@section('title', 'Transacción aprobada')

@section('content')
    <body class="bg-light">
        <div class="d-flex justify-content-center py-5">
            <img class="rounded w-75" src="https://d22fxaf9t8d39k.cloudfront.net/descripciones/c42cbe258a2457927193bbafd2bc89877e937a4cc52336b4c81ee6071ac55ddc34273.png">
        </div>

        @if (request()->pasarela == 'payu')
            <div class="max-w-3x1 mx-auto sm:px-6 lg:px-8">

                @php
                    $firma_cadena = config('services.payu.api_key') . '~' . request()->merchantId . '~' . request()->referenceCode . '~' . number_format(request()->TX_VALUE, 1, '.', '') . '~' . request()->currency . '~' . request()->transactionState;
                    $firmacreada = md5($firma_cadena);
                    $firma = $_REQUEST['signature'];
                @endphp

                @if (strtoupper($firma) == strtoupper($firmacreada))

                <div class="container text-white">
                    <h2>Resumen de la transacción</h2>
                    <table class="table text-white">
                        <tr>
                            <td>Estado de la transacción</td>
                            <td>
                                @switch(request()->transactionState)
                                    @case(4)
                                        Transacción aprobada
                                        @break
                                    @case(6)
                                        Transacción rechazada
                                        @break
                                    @case(104)
                                        Error
                                        @break
                                    @case(7)
                                        Pago pendiente
                                        @break
                                    @default
                                        {{request()->mensaje}}
                                @endswitch
                            </td>
                        </tr>

                        <tr>
                            <td>ID de la transacción</td>
                            <td>{{request()->transactionId}}</td>
                        </tr>

                        <tr>
                            <td>Referencia de venta</td>
                            <td>{{request()->reference_pol}}</td>
                        </tr>

                        <tr>
                            <td>Referencia de la transacción</td>
                            <td>{{request()->referenceCode}}</td>
                        </tr>

                        @if (request()->pseBank != null)

                            <tr>
                                <td>cus</td>
                                <td>{{request()->cus}}</td>
                            </tr>

                            <tr>
                                <td>Banco</td>
                                <td>{{request()->pseBank}}</td>
                            </tr>
                        @endif

                        <tr>
                            <td>Valor total</td>
                            <td>${{number_format(request()->TX_VALUE)}}</td>
                        </tr>

                        <tr>
                            <td>Moneda</td>
                            <td>{{request()->currency}}</td>
                        </tr>

                        <tr>
                            <td>Descripción</td>
                            <td>{{request()->description}}</td>
                        </tr>

                        <tr>
                            <td>Entidad:</td>
                            <td>{{request()->lapPaymentMethod}}</td>
                        </tr>
                    </table>
                </div>
                        
                @else
                    <h1>Error validando la firma digital.</h1>
                @endif
            </div>
        @endif
    </body>
@endsection