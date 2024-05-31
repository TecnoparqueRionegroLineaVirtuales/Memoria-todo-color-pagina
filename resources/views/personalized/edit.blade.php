@extends('layouts.templateAdmin')

@section('title', 'Editar Personalización')

@include('layouts.navAdmin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Editar Personalización</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('personalized.update', $personalizacion->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')

                <!-- Campos del formulario -->
                <div class="form-group">
                    <label for="artistSelect">Artista:</label>
                    <select id="artistSelect" name="artista_id" class="form-control" onchange="updateMurals()">
                        @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" {{ $artist->id == $personalizacion->artista_id ? 'selected' : '' }} data-murals="{{ $artist->files->toJson() }}">
                            {{ $artist->dataUser->name }} {{ $artist->dataUser->last_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="muralSelect">Mural:</label>
                    <select id="muralSelect" name="mural_id" class="form-control">
                        <option value="">Selecciona un Mural</option>
                        <!-- Las opciones se llenarán dinámicamente -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="productoSelect">Producto:</label>
                    <select id="productoSelect" name="producto_id" class="form-control">
                        @foreach ($customizableProducts as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $personalizacion->producto_id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control">{{ $personalizacion->descripcion }}</textarea>
                </div>

                <div class="form-group">
                    <label for="datos_contacto">Datos de Contacto:</label>
                    <input type="text" id="datos_contacto" name="datos_contacto" class="form-control" required value="{{ $personalizacion->datos_contacto }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
        option.selected = mural.id === {{ $personalizacion->mural_id }}; // Marca el actual como seleccionado si corresponde
        muralSelect.add(option);
    });
}

// Llamada inicial para cargar los murales correspondientes al artista seleccionado al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    updateMurals();
});
</script>

@endsection
