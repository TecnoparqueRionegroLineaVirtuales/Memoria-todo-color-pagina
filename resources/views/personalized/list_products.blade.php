@extends('layouts.templateAdmin')

@section('title', 'Listado de Productos Personalizables')

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
                                <h1 class="text-center">Listado de Productos Personalizables</h1>
                                <a href="{{ route('personalized.create_product') }}" class="btn btn-success">Agregar Nuevo Producto</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Activo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->active ? 'Sí' : 'No' }}</td>
                                        <td>
                                            <a href="{{ route('personalized.edit_product', $product->id) }}" class="btn btn-info">Editar</a>
                                            <form action="{{ route('personalized.delete_product', $product->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
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
