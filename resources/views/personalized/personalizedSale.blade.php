@extends('layouts.template')
@include('layouts.nav')
@section('title', 'Rutas')
@section('content')
<form action="{{ route('personalizedSaleStore') }}" method="POST">
    @csrf

    <!-- Lista desplegable para seleccionar un artista -->
    <select id="artistSelect" name="artista_id" required onchange="updateMurals()">
        <option value="">Selecciona un Artista</option>
        @foreach ($artists as $artist)
            <option value="{{ $artist->id }}" data-murals="{{ $artist->files->toJson() }}">
                {{ $artist->dataUser->name }} {{ $artist->dataUser->last_name }}
            </option>
        @endforeach
    </select>

    <!-- Lista desplegable para seleccionar un mural -->
    <select id="muralSelect" name="mural_id" required>
        <option value="">Selecciona un Mural</option>
    </select>

    <!-- Lista desplegable para seleccionar un producto a personalizar -->
    <select name="producto_id" required>
        <option value="">Selecciona un Producto</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>

    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <input type="text" name="datos_contacto" required placeholder="Datos de Contacto">
    <button type="submit">Enviar</button>
</form>

<script>
function updateMurals() {
    const artistSelect = document.getElementById('artistSelect');
    const selectedOption = artistSelect.options[artistSelect.selectedIndex];
    const murals = JSON.parse(selectedOption.getAttribute('data-murals'));
    const muralSelect = document.getElementById('muralSelect');
    muralSelect.innerHTML = '<option value="">Selecciona un Mural</option>'; // Limpiar opciones existentes

    murals.forEach(mural => {
        const option = new Option(mural.name, mural.id);
        muralSelect.add(option);
    });
}
</script>

@endsection
