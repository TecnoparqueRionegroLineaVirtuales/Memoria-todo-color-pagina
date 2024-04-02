@extends('layouts.templateAdmin')

@section('title', 'Panel Administrativo')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>


                   {{--Aqui va el contenido a mostrar en la pagina--}}
                   <div id="content">
                        <section class="py-5">
                            <div class="container">
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card shadow border-0 mb-4">
                                            {{--titulo card--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between d-inline-block">
                                                        <h6 class="font-weight-bold ">Menús</h6> <i class="fa-solid fa-bars me-2 lead d-flex align-self-center"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Boton--}}
                                            <div class="card-body">
                                                <a class="btn btn-secondary w-100 btnAdmin text-black" href="{{route('admin.menus.index')}}">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-between d-inline-block">Menú <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="card shadow border-0  mb-4">
                                            {{--titulo card--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between d-inline-block">
                                                        <h6 class="font-weight-bold ">Contenido</h6> <i class="fa-solid fa-newspaper me-2 lead d-flex align-self-center"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Boton--}}
                                            <div class="card-body">
                                                <a class="btn btn-secondary w-100 btnAdmin text-black" href="{{route('admin.articles.index')}}">
                                                    <div class="row">
                                                        <div class="d-flex justify-content-between d-inline-block">Contenido <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="card shadow border-0  mb-4">
                                            {{--titulo card--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between d-inline-block">
                                                        <h6 class="font-weight-bold ">Tienda</h6> <i class="fa-solid fa-cart-shopping me-2 lead d-flex align-self-center"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--Botones--}}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <a class="btn btn-secondary w-100 btnAdmin text-black" href="{{ route('admin.products.index') }}">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Producto <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <a  href="{{ route('categoryProductsIndex') }}" class="btn btn-secondary w-100 btnAdmin text-black">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Categoría de producto <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-md-12">
                                        <div class="card shadow border-0  mb-4">
                                            {{--titulo card--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between d-inline-block">
                                                        <h6 class="font-weight-bold ">Galería</h6> <i class="fa-solid fa-photo-film me-2 lead d-flex align-self-center"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Botones--}}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <a class="btn btn-secondary w-100 btnAdmin text-black" href="{{ route('admin.files.index') }}">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Multimedia <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-secondary w-100 btnAdmin text-black" href="{{route('admin.galleries.index')}}">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Categoría <i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card shadow border-0  mb-4">
                                            {{--titulo card--}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="d-flex justify-content-between d-inline-block">
                                                        <h6 class="font-weight-bold ">Gestión de usuarios</h6> <i class="fa-solid fa-users me-2 lead d-flex align-self-center"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--Botones--}}    
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <a href="{{ route('user_types')}}" class="btn btn-secondary w-100 btnAdmin text-black">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Tipos de usuarios<i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <a href="{{ route('data_users_consult')}}" class="btn btn-secondary w-100 btnAdmin text-black">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-between d-inline-block">Usuarios<i class="fa-solid fa-plus d-flex align-self-center "></i></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>
@endsection

