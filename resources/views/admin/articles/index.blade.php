@extends('layouts.templateAdmin')

@section('title', 'Artículos')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>


                    {{--Aqui va el contenido a mostrar en la pagina--}}
                   <div id="content">
                        <section class="py-5 ">
                            <div class="container d-flex justify-content-end w-75 mb-4">
                                <a href="{{route('admin.articles.create')}}"class="btn btn-dark">Agregar Artículo</a>
                            </div>
                            <div class="container d-flex justify-content-center">
                                <div class=" col-sm-12">
                                    <div class="card-header d-flex justify-content-center">
                                        <h1 class="fs-2">Contenido de la Página</h1>
                                    </div>

                                    <div class="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th >#</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($datosArticles as $datosArticle)
                                                    <tr>
                                                        <td class="m-5 p-3">{{$datosArticle->id}}</td>
                                                        <td> {{$datosArticle->html}} </td>
                                                        <td>{{$datosArticle->state->description}}</td>
                                                        <td width="320">
                                                            <form action="{{route('admin.articles.destroy', $datosArticle->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="btn btn-dark w-25" href="{{url('admin/articles/'.$datosArticle->id.'/edit')}}"><i class="fa-solid fa-edit"></i></a>
                                                                <button class="btn btn-dark w-25" type="submit" onclick="return confirm('¿Desea eliminar la Categoría?');"><i class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                        {{ $datosArticles->links() }}
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
