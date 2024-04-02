@extends('layouts.templateAdmin')

@section('title', 'Editar Menú')

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
                                        <h1 class="fs-2">Editar Menú</h1>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{url('admin/menus/'.$menu->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @include('admin.menus.form', ['Modo'=>'editar'])

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
