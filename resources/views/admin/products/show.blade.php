@extends('layouts.templateAdmin')

@section('title', $product->name)

@section('content')
    <div class="contenedor" id="contenedor">
            
        <div class="menuLateral" id="menuLateral">

            <header>@include('layouts.navAdmin')</header>
            
            <div id="content">
                <div class="mt-5">
                    @include('layouts.templateProducts')
                </div>
            </div>
        </div>
    </div>
@endsection