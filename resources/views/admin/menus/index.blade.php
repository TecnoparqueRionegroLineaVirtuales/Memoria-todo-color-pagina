@extends('layouts.templateAdmin')

@section('title', 'Menús')

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
                                <a href="{{route('admin.menus.create')}}"class="btn btn-dark">Agregar Menú</a>
                            </div>

                            <div class="container d-flex justify-content-center">

                                <div class=" w-100">

                                    <div class="card-header d-flex justify-content-center mb-4">
                                        <h1 class="fs-2">Menús</h1>
                                    </div>
                                    <div >
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th >#</th>
                                                    <th>Título</th>
                                                    <th>Ruta</th>
                                                    <th>Estado</th>
                                                    <th>Tipo de Menú</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                                @foreach ($datos as $dato)
                                                    <tr>
                                                        <td class="m-5 p-3">{{$dato->id}}</td>
                                                        <td>{{$dato->title}}</td>
                                                        <td>{{$dato->route}}
                                                        <td>{{$dato->state->description}}
                                                        <td>{{$dato->menuType->description}}

                                                            <div class="form-check form-switch">
                                                                {{-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> --}}
                                                                {{-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> --}}
                                                            </div>
                                                        </td>
                                                        <td width="320">
                                                            <form action="{{route('admin.menus.destroy', $dato->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="btn btn-dark w-25" href="{{url('admin/menus/'. $dato->id. '/edit')}}"><i class="fa-solid fa-edit"></i></a>
                                                                <button class="btn btn-dark w-25" type="submit" onclick="return confirm('¿Desea eliminar la Categoría?');"><i class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                            
                                                        </td>
                                                        <td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        
                                        {{$datos->links()}}
                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
            </div>

        </div>
    </div>
@endsection
