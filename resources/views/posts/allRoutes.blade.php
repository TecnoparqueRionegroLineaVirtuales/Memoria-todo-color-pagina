@extends('layouts.template')  
@include('layouts.nav')
@section('title', 'Rutas con Imágenes')

@section('content')
<div class="container p-2 mb-4">
    <div class="w-100 h2 mx-auto mb-3 text-secondary text-center border-bottom border-secondary">
        Rutas
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/400x200' }}" class="card-img-top" alt="Imagen de la ruta" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="https://wa.me/{{ $post->phone }}" target="_blank" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Contactar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
@endsection
