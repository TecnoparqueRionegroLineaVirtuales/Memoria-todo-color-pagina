@extends('layouts.template')
@include('layouts.nav')
@section('title', 'Compra personalizada')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4" style="color: white;">Solicita tu producto personalizado</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('personalizedSaleStore') }}" method="POST" class="card card-body">
                @csrf

                <!-- Lista desplegable para seleccionar un artista -->
                <div class="form-group mb-3">
                    <label for="artistSelect" class="form-label">Artista:</label>
                    <select id="artistSelect" name="artista_id" class="form-control" required onchange="updateMurals()">
                        <option value="">Selecciona un Artista</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" data-murals="{{ $artist->files->toJson() }}">
                                {{ $artist->dataUser->name }} {{ $artist->dataUser->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Lista desplegable para seleccionar un mural -->
                <div class="form-group mb-3">
                    <label for="muralSelect" class="form-label">Mural:</label>
                    <select id="muralSelect" name="mural_id" class="form-control" required>
                        <option value="">Selecciona un Mural</option>
                    </select>
                </div>

                <!-- Lista desplegable para seleccionar un producto personalizable -->
                <div class="form-group mb-3">
                    <label for="productoSelect" class="form-label">Producto:</label>
                    <select id="productoSelect" name="customizable_product_id" class="form-control" required>
                        <option value="">Selecciona un Producto Personalizable</option>
                        @foreach ($customizableProducts as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para descripción -->
                <div class="form-group mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripción"></textarea>
                </div>

                <!-- Campo para datos de contacto -->
                <div class="form-group mb-3">
                    <label for="datos_contacto" class="form-label">Datos de Contacto:</label>
                    <input type="text" id="datos_contacto" name="datos_contacto" class="form-control" required placeholder="Datos de Contacto">
                </div>

                <!-- Botón de envío -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateMurals() {
    const artistSelect = document.getElementById('artistSelect');
    const selectedOption = artistSelect.options[artistSelect.selectedIndex];
    const murals = JSON.parse(selectedOption.getAttribute('data-murals'));
    const muralSelect = document.getElementById('muralSelect');
    muralSelect.innerHTML = '<option value="">Selecciona un Mural</option>';

    murals.forEach(mural => {
        const option = new Option(mural.name, mural.id);
        muralSelect.add(option);
    });
}
</script>

@endsection
