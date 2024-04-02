@extends('layouts.templateAdmin')

@section('title', 'Archivos')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="menuLateral" id="menuLateral">

            <header>@include('layouts.navAdmin')</header>
            
            <div id="content">
                <div class="container mt-5">
                    @if ($files->isEmpty())
                        <div class="text-center">
                            <h1>Aún no has subido archivos</h1>
                            <a href="{{ route('admin.files.create') }}">
                                <button class="btn btn-dark">Subir un archivo</button>
                            </a>
                        </div>
                        
                    @else
                        <div class="card-header d-flex justify-content-center mb-4">
                            <h1>Archivos</h1>
                        </div>
    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($files as $file) 
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>{{ $file->name }}</td>
                                        <td>{{ $file->fileTypes->description }}</td>
                                        <td>{{ $file->categories->description }}</td>
                                        <td>{{ $file->states->description }}</td>
                                        <td>
                                            <form action="{{ route('admin.files.destroy', $file) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                
                                                <a class="btn btn-dark" href="{{ URL::asset($file->route) }}" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                <a class="btn btn-dark" href="{{ route('admin.files.edit', $file) }}"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            <div>
                                {{ $files->links() }}
                            </div>
                            <a class="mx-5" href="{{ route('admin.files.create') }}">
                                <button class="btn btn-dark">Subir un archivo</button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection