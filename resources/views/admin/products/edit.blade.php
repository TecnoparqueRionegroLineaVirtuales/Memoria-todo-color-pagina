@extends('layouts.templateAdmin')

@section('title', 'Editar producto')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="menuLateral" id="menuLateral">

            <header>@include('layouts.navAdmin')</header>

            <div id="content">
                <div class="container">
                    <div class="card mt-5">
                        <h1 class="text-center card-header">Actualizar producto</h1>
                        
                        <div class="card-body">
                            <form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                
                                <div>
                                    <label class="form-label">Nombre:</label>
                                    <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                    @error('name')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                
                                <div>
                                    <label class="form-label mt-2">Descripción:</label>
                                    <textarea class="form-control" rows="5" name="description">{{ $product->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
        
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label mt-2">Precio:</label>
                                        <input class="form-control" type="number" name="price" value="{{ $product->price }}">
                                        @error('price')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Cantidad:</label>
                                        <input class="form-control" type="number" name="quantity" value="{{ $product->quantity }}">
                                        @error('quantity')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-4">
                                        <label class="form-label mt-2">Stock:</label>
                                        <input class="form-control" type="number" name="stock" value="{{ $product->stock }}">
                                        @error('stock')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Estado:</label>
                                        <select class="form-select" name="state_id">
                                            @foreach ($states as $state)
                                                @if ($state->id == $product->states->id)
                                                    <option value="{{$state->id}}" selected>{{ $product->states->description }}</option>
                                                @else
                                                    <option value="{{$state->id}}">{{$state->description}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Imagen:</label>
                                        <select name="file_id" class="form-select">
                                            @foreach ($files as $file)
                                                @if ($file->id == $product->files->id)
                                                    <option value="{{$file->id}}" selected>{{ $product->files->name }}</option>
                                                @else
                                                    <option value="{{$file->id}}">{{$file->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <a href="{{ route('admin.files.create') }}" target="_blank">Subir imagen</a>
                                        @error('file_id')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Categoría:</label>
                                        <select class="form-select" name="category_product_id">
                                            @foreach ($categoryProducts as $category)
                                                @if ($category->id == $product->categories->id)
                                                    <option value="{{$category->id}}" selected>{{ $product->categories->description }}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->description}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_product_id')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="text-center mt-3">
                                    <button class="btn btn-dark w-25" type="submit">Actualizar</button>
                                </div>
                            </form>
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-light">Regresar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection