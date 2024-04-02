@extends('layouts.template')

@extends('layouts.nav')

@section('title', $product->name)

@section('content')
    <body class="bg-light">

        @include('layouts.templateProducts')


        @section('buttons')

        @endsection

    </body>

@endsection
