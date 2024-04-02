
<div class="row">
    <div class="mb-3">
        <label for="description" class="form-label">Categoría</label>
        <input class="form-control" type="text" name="description" placeholder="Nombre de la Categoría" value="{{isset($category->description)? $category->description: ""}}">
        @error('description')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="d-flex justify-content-center col-sm-12">
        <input class="btn btn-primary me-4" type="submit" value="{{$Modo=='crear' ? 'Agregar': 'Modificar'}}">
        <a href="{{route('admin.galleries.index')}}" class="btn btn-secondary text-dark">Regresar</a>
    </div>
</div>
