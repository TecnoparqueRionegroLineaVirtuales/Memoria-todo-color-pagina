@extends('layouts.templateAdmin')

@section('title', 'Categoría')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>


                   {{--Aqui va el contenido a mostrar en la pagina--}}
                   <div id="content">

                        <section class="py-5">

                            <div class="container d-flex justify-content-end w-75 mb-4">
                                <a href="{{route('admin.galleries.create')}}"class="btn btn-primary">Agregar Categoría</a>
                            </div>

                            <div class="container d-flex justify-content-center">

                                <div class=" w-100">

                                    <div class="card-header d-flex justify-content-center mb-4">
                                        <h1 class="fs-2">Categorías</h1>
                                    </div>
                                    <div >
                                        <table class="table table-hover bg-white rounded">
                                            <thead class="bg-light">
                                                <tr class="">
                                                    <th >#</th>
                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($categorias as $categoria)


                                                    <tr>
                                                        <td class="m-5 p-3">{{$categoria->id}}</td>
                                                        <td>{{$categoria->description}}</td>
                                                        <td>

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                {{-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('admin.galleries.destroy', $categoria->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn" type="submit" onclick="return confirm('¿Desea eliminar la Categoría?');">Eliminar</button>
                                                            </form>
                                                        </td>
                                                        <td><a href="{{url('admin/galleries/'. $categoria->id. '/edit')}}">Editar</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
            </div>

        </div>
    </div>
@endsection
