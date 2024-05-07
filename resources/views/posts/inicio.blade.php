@extends('layouts.templateAdmin')

@section('title', 'Rutas Culturales')

@section('content')
<div class="contenedor" id="contenedor">
    <div class="d-flex">
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>

            <div id="content">
                <section class="py-5">
                    <div class="container d-flex justify-content-end w-75 mb-4">
                        <a href="{{ route('rutaCultural.create') }}" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Crear nueva ruta</a>  {{-- Botón con icono de 'plus' --}}
                    </div>

                    <div class="container d-flex justify-content-center">
                        <div class="w-100">
                            <div class="card-header d-flex justify-content-center mb-4">
                                <h1 class="fs-2">Rutas Culturales</h1>
                            </div>

                            <div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Descripción</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->phone }}</td>
                                                <td>
                                                    <a href="{{ route('rutaCultural.show', $post) }}" class="btn btn-dark"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('rutaCultural.edit', $post) }}" class="btn btn-dark"><i class="fa-solid fa-pencil"></i></a>
                                                    <form action="{{ route('rutaCultural.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
