@extends('layouts.templateAdmin')

@section('title', 'Detalle de Ruta Cultural')

@section('content')
<div class="contenedor" id="contenedor">
    <div class="d-flex">
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>
            <div id="content">
                <section class="py-5">
                    <div class="container d-flex justify-content-end w-75 mb-4">
                        <a href="{{ route('posts.inicio') }}" class="btn btn-dark">Volver a la lista</a>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <div class="w-100">
                            <div class="card-header d-flex justify-content-center mb-4">
                                <h1 class="fs-2">{{ $post->title }}</h1>
                            </div>
                            <div class="card-body">
                                <p>{{ $post->description }}</p>
                                <p>Teléfono: {{ $post->phone }}</p>
                                @if ($post->image)
                                <div>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen de la ruta cultural" style="max-width: 100%; height: auto;">
                                </div>
                            @else
                                <p>No hay imagen disponible.</p>
                            @endif
                            
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
