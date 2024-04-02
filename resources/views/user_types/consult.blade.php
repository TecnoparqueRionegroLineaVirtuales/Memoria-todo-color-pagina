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
                                @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                    <h2>Roles del sistema</h2>
                                        <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user_types as $user)
                                            <tr>
                                                
                                                    <th>{{ $user->id }}</th>
                                                    <th>{{ $user->description }}</th>
                                                    <th>
                                                        <a href="{{ route('user_types_edit', $user->id)}}" class="btn btn-dark btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                    </th>
                                                    <th>
                                                        <form action="{{ route('user_types_destroy', $user->id)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Desea eliminar el tipo de usuario?');"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                        </form>
                                                    </th>
                                                    
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table> 
                                        <a href="{{ route('user_types_register_form')}}" class="btn btn-dark btn-sm">
                                            
                                                <i class="fa-light fa-plus"></i> Agregar tipo de Usuario
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