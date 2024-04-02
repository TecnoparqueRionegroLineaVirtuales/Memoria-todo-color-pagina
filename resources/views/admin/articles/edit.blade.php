@extends('layouts.templateAdmin')

@section('title', 'Editar Contenido')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>


                    {{--Aqui va el contenido a mostrar en la pagina--}}
                   <div id="content">
                        <section class="py-5">
                            <div class="container d-flex justify-content-center">
                                <div class="card w-75 col-sm-12">
                                    <div class="card-header d-flex justify-content-center">
                                        <h1 class="fs-2">Editar Contenido</h1>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{url('admin/articles/'.$article->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @include('admin.articles.form', ['Modo'=>'editar'])

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </section>
                        {{-- contenido --}}
                    </div>
            </div>

        </div>
    </div>
@endsection
