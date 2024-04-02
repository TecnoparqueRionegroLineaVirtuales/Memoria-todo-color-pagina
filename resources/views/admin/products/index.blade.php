@extends('layouts.templateAdmin')

@section('title', 'Productos')

@section('content')
    <div class="contenedor" id="contenedor">
        <div class="menuLateral" id="menuLateral">

            <header>@include('layouts.navAdmin')</header>
            <div id="content">
                @if ($products->isEmpty())
                    <div class="text-center mt-5">    
                        <h1>Aún no has publicado productos</h1>
                        <a href="{{ route('admin.products.create') }}">
                            <button class="btn btn-primary">Agregar productos</button>
                        </a>
                    </div>
                @else
                    <div class="container mt-5">
                        <div class="card-header d-flex justify-content-center mb-4">
                            <h1>Productos</h1>
                        </div>
    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)    
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <div style="width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                                                {{ $product->description }}
                                            </div>
                                        </td>
                                        <td>$ {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->states->description }}</td>
                                        <td>{{ $product->categories->description }}</td>
                                        <td>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                
                                                <a class="btn btn-dark" href="{{ route('admin.products.show', $product) }}"><i class="fa-solid fa-eye"></i></a>
                                                <a class="btn btn-dark" href="{{ route('admin.products.edit', $product) }}"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            <div>
                                {{ $products->links() }}
                            </div>
                            <a class="mx-5" href="{{ route('admin.products.create') }}">
                                <button class="btn btn-dark">Agregar producto</button>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
</div>
@endsection