@extends('layouts.templateAdmin')

@section('title', 'Editar Producto Personalizable')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="menuLateral" id="menuLateral">
            <header>@include('layouts.navAdmin')</header>

            <div id="content">
                <div class="container">
                    <div class="card mt-5">
                        <h1 class="text-center card-header mb-3">Editar Producto Personalizable</h1>

                        <div class="card-body">
                            <form action="{{ route('personalized.update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Cambio a método PUT para actualizar -->

                                <div>
                                    <label class="form-label">Nombre del Producto:</label>
                                    <input class="form-control" type="text" name="name" value="{{ $product->name }}" required>
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

                                <div class="form-check mt-4 mb-4">
                                    <input class="form-check-input" type="checkbox" value="1" id="active" name="active" {{ $product->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">
                                        Producto Activo
                                    </label>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-primary" type="submit">Actualizar Producto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
