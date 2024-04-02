@extends('layouts.templateAdmin')

@section('title', 'Publicar producto')

@section('content')
    <div class="contenedor" id="contenedor">
        
        <div class="menuLateral" id="menuLateral">

            <header>@include('layouts.navAdmin')</header>
            
            <div id="content">
                <div class="container">
                    <div class="card mt-5">
                        <h1 class="text-center card-header mb-3">Agregar producto</h1>
                        
                        <div class="card-body">
                            <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                
                                <div>
                                    <label class="form-label">Nombre:</label>
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}">
                                    @error('name')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                
                                <div>
                                    <label class="form-label mt-2">Descripción:</label>
                                    <textarea class="form-control" rows="5" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
        
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label mt-2">Precio:</label>
                                        <input class="form-control" type="number" name="price" value="{{old('price')}}">
                                        @error('price')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Cantidad:</label>
                                        <input class="form-control" type="number" name="quantity" value="{{old('quantity')}}">
                                        @error('quantity')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-4">
                                        <label class="form-label mt-2">Stock:</label>
                                        <input class="form-control" type="number" name="stock" value="{{old('stock')}}">
                                        @error('stock')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Estado:</label>
                                        <select class="form-select" name="state_id">
                                            <option selected disabled>Selecciona...</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->description }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-4">
                                        <label class="form-label mt-2">Imagen:</label>
                                        <select name="file_id" class="form-select">
                                            <option selected disabled>Selecciona...</option>
                                            @foreach ($files as $file)
                                                <option value="{{ $file->id }}">{{ $file->name }}</option>
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
                                            <option selected disabled>Selecciona...</option>
                                            @foreach ($categoryProducts as $category)
                                                <option value="{{ $category->id }}">{{ $category->description }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_product_id')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="text-center mt-3">
                                    <button class="btn btn-dark w-25" type="submit">Publicar</button>
                                </div>
                            </form>
                            <a href="{{ route('admin.products.index') }}">
                                <button class="btn btn-light">Regresar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection