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
                            <div class="col-lg-3 col-md-6">
                                <div class="card shadow border-0 mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold">Menús</h6>
                                            <i class="fa-solid fa-bars lead"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a class="btn btn-secondary w-100 text-black" href="{{ route('admin.menus.index') }}">
                                            Menú <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card shadow border-0 mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold">Contenido</h6>
                                            <i class="fa-solid fa-newspaper lead"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a class="btn btn-secondary w-100 text-black" href="{{ route('admin.articles.index') }}">
                                            Contenido <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card shadow border-0 mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold">Tienda</h6>
                                            <i class="fa-solid fa-cart-shopping lead"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a class="btn btn-secondary w-100 text-black" href="{{ route('admin.products.index') }}">
                                                    Producto <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a class="btn btn-secondary w-100 text-black" href="{{ route('categoryProductsIndex') }}">
                                                    Categoría de producto <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow border-0 mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold">Rutas Culturales</h6>
                                            <i class="fa fa-file-image-o"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a class="btn btn-secondary w-100 text-black" href="{{ route('posts.inicio') }}">
                                            gestionar rutas <i class="fa-solid fa-plus"></i>
                                        </a>
                                        
                                        </a>
                                        <a class="btn btn-secondary w-100 text-black" href="{{ route('rutaCultural.create') }}">
                                            Agregar Ruta <i class="fa-solid fa-plus"></i>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow border-0 mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold">Galería</h6>
                                            <i class="fa-solid fa-photo-film lead"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a class="btn btn-secondary w-100 text-black" href="{{ route('admin.files.index') }}">
                                                    Multimedia <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a class="btn btn-secondary w-100 text-black" href="{{ route('admin.galleries.index') }}">
                                                    Categoría <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{-- Panel para Productos Personalizables --}}
                   <div class="col-lg-3 col-md-6">
                    <div class="card shadow border-0 mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-bold">Productos Personalizables</h6>
                                <i class="fa-solid fa-puzzle-piece lead"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-secondary w-100 text-black" href="{{ route('personalized.list_products') }}">
                                Administrar Productos personalizables<i class="fa-solid fa-eye"></i>
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
