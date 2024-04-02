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
                                <div class="row justify-content-center">
                                    <div class="col-sm">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <h2>Usuarios</h2>
                                        <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Genero</th>
                                                <th>Telefono</th>
                                                <th>Biografia</th>
                                                <th>Tipo de usuario</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_users as $user)
                                            <tr>
                                                
                                                
                                                    <th>{{ $user->users->email }}</th>
                                                    <th>{{ $user->name }}</th>
                                                    <th>{{ $user->last_name }}</th>
                                                    <th>{{ $user->gender }}</th>
                                                    <th>{{ $user->phone }}</th>
                                                    <th>{{ $user->biography }}</th>
                                                    <th>{{ $user->users->user_types->description }}</th>
                                                    <th>{{ $user->users->states->description }}</th>
                                                    
                                                    
                                                    
                                                    <th>
                                                        <a href="{{ route('data_users_edit', $user->users->id)}}" class="btn btn-dark btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                            
                                                    <th>
                                                        <form action="{{ route('destroyUser', $user->users->id)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Desea eliminar el usuario?');"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                        </form>
                                                    </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table> 
                                        <a href="{{ route('addUser')}}" class="btn btn-dark btn-sm">
                                            <i class="fa-light fa-plus"></i> Agregar
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