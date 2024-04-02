@extends('layouts.templateAdmin')

@section('title', 'Crear Categoría')

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
                                    <div class="card-body">
                                    <form method="post" action="{{ route('categoryProductsUpdate', $id->id )}}">
                                    @csrf
                                    @method('PUT')
                                        <h2>Actualizar Categoria</h2>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Categoria</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $id->description}}" name="description">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="submit" class="btn btn-dark" value="Actualizar"> 
                                        </div>
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