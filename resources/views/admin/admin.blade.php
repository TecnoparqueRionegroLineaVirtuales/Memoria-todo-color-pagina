@extends('layouts.templateAdmin')

@section('title', 'Panel Administrativo')

@section('content')
<div class="contenedor" id="contenedor">
    <div class="d-flex justify-content-center">
        {{-- Menú Lateral --}}
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>

            {{-- Contenido --}}
            <div id="content">
                <section class="py-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            {{-- Tarjetas de Acciones en Columnas Uniformes --}}
                            @php
                                $panels = [
                                    ['title' => 'Menús', 'icon' => 'fa-bars', 'route' => 'admin.menus.index', 'text' => 'Menú'],
                                    ['title' => 'Contenido', 'icon' => 'fa-newspaper', 'route' => 'admin.articles.index', 'text' => 'Contenido'],
                                    ['title' => 'Producto', 'icon' => 'fa-cart-shopping', 'route' => 'admin.products.index', 'text' => 'Producto'],
                                    ['title' => 'Categoría de producto', 'icon' => 'fa-cart-shopping', 'route' => 'categoryProductsIndex', 'text' => 'Categoría de producto'],
                                    ['title' => 'Rutas Culturales', 'icon' => 'fa-file-image-o', 'route' => 'posts.inicio', 'text' => 'Gestionar rutas'],
                                    ['title' => 'Agregar Ruta', 'icon' => 'fa-plus', 'route' => 'rutaCultural.create', 'text' => 'Agregar Ruta'],
                                    ['title' => 'Multimedia', 'icon' => 'fa-photo-film', 'route' => 'admin.files.index', 'text' => 'Multimedia'],
                                    ['title' => 'Categoría', 'icon' => 'fa-photo-film', 'route' => 'admin.galleries.index', 'text' => 'Categoría'],
                                    ['title' => 'Productos Personalizables', 'icon' => 'fa-puzzle-piece', 'route' => 'personalized.list_products', 'text' => 'Administrar Productos personalizables'],
                                    ['title' => 'Compras personalizadas', 'icon' => 'fa-puzzle-piece', 'route' => 'personalized.list', 'text' => 'Administrar compras personalizadas'],
                                ];
                            @endphp

                            @foreach ($panels as $panel)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card shadow border-0 h-100">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-bold">{{ $panel['title'] }}</h6>
                                                <i class="fa-solid {{ $panel['icon'] }} lead"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-secondary w-100 text-white" href="{{ route($panel['route']) }}">
                                                {{ $panel['text'] }} <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
