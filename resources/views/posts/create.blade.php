@extends('layouts.templateAdmin')  {{-- Cambio de template a templateAdmin --}}

@section('title', 'Crear Ruta')

@section('content')
<div class="contenedor" id="contenedor">
    <div class="d-flex">
        {{-- Menú Lateral --}}
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>  {{-- Inclusión de navAdmin --}}

            {{-- Aquí va el contenido a mostrar en la pagina --}}
            <div id="content">
                <section class="py-5">
                    <div class="container d-flex justify-content-end w-75 mb-4">
                        <a href="{{route('posts.inicio')}}" class="btn btn-dark">Volver a la lista</a>  {{-- Botón para volver, estilizado como en admin --}}
                    </div>

                    <div class="container d-flex justify-content-center">
                        <div class="w-100">
                            <div class="card-header d-flex justify-content-center mb-4">
                                <h1 class="fs-2">Crear Ruta</h1>
                            </div>

                            <div>
                                <form action="{{ route('rutaCultural.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Numero de contacto</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-dark">Crear</button>  {{-- Botón estilizado como en admin --}}
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
