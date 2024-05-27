@extends('layouts.templateAdmin')

@section('title', 'Compras persolanizadas')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>

            <div id="content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="text-center">Compras personalizadas</h1>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Artista</th>
                                        <th>Mural</th>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th>Contacto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personalizacions as $personalizacion)
                                    <tr>
                                        <td>{{ $personalizacion->id }}</td>
                                        <td>{{ $personalizacion->artista ? $personalizacion->artista->dataUser->name . ' ' . $personalizacion->artista->dataUser->last_name : 'Artista no encontrado' }}</td>
                                        <td>{{ $personalizacion->mural ? $personalizacion->mural->name : 'Mural no encontrado' }}</td>
                                        <td>{{ $personalizacion->producto ? $personalizacion->producto->name : 'Producto no encontrado' }}</td>
                                        <td>{{ $personalizacion->descripcion }}</td>
                                        <td>{{ $personalizacion->datos_contacto }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('personalized.edit', $personalizacion->id) }}">Editar</a>
                                            <form action="{{ route('personalized.destroy', $personalizacion->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
