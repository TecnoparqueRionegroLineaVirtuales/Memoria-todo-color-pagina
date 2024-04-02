@extends('layouts.templateAdmin')

@section('title', 'Panel Administrativo')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>

                   {{--contenido--}}
                   <div id="content">
                        <section class="py-5">
                             <div class="container">
                                <div class="row justify-content-center">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                    <h2>Categorias de productos</h2>
                                        <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($category_products as $category)
                                            <tr>
                                                
                                                    <th>{{ $category->id }}</th>
                                                    <th>{{ $category->description }}</th>
                                                    
                                                    <th>
                                                        <a href="{{ route('categoryProductsEdit', $category->id)}}" class="btn btn-dark btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <form action="{{ route('categoryProductsDelete', $category->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Desea eliminar la Categoría?');"> 
                                                                <i class="fas fa-trash-alt"></i> Eliminar
                                                            </button>
                                                         </form>
                                                    </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table> 
                                        <a  href="{{ route('categoryProductsCreate') }}" class="btn btn-dark btn-sm">
                                            <i class="fa-light fa-plus"></i> Insertar Categoría de producto 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
             </div>
        </div>
    </div>
</div>
@endsection