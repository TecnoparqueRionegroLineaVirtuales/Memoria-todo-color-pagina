@extends('layouts.templateAdmin') 

@section('title', 'Editar Ruta')

@section('content')
<div class="contenedor" id="contenedor">
    <div class="d-flex">
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>

            <div id="content">
                <section class="py-5">
                    <div class="container d-flex justify-content-end w-75 mb-4">
                        <a href="{{route('posts.inicio')}}" class="btn btn-dark">Volver a la lista</a>
                    </div>

                    <div class="container d-flex justify-content-center">
                        <div class="w-100">
                            <div class="card-header d-flex justify-content-center mb-4">
                                <h1 class="fs-2">Editar Ruta</h1>
                            </div>

                            <div>
                                <form action="{{ route('rutaCultural.update', $post) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $post->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $post->phone }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($post->image)
                                            <div>
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen de la ruta cultural" style="max-width: 50%; height: auto;">
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-dark">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
