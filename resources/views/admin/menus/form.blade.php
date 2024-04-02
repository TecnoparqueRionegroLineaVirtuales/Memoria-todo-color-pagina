
<div>
    <div class="row">
        <div class="mb-3 col-lg-6">
            <label for="title" class="form-label">Titulo</label>
            <input class="form-control" type="text" name="title" placeholder="Título de Menú" value="{{isset($menu->title)? $menu->title: ""}}">
            @error('title')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3 col-lg-6">
            <label for="route" class="form-label">Ruta</label>
            <input class="form-control" type="text" name="route" placeholder="Ruta de menú" value="{{isset($menu->route)? $menu->route:""}}">
            @error('route')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="state_id">Estado</label>
            <select name="state_id" id="state_id" class="form-select">
                <option selected disabled>Seleccione</option>
                @foreach ($states as $state)
                    @if (isset($menu->state_id))
                        @if ($menu->state_id == $state->id )
                            <option value="{{$state->id}}" selected>{{$state->description}}</option> 
                        @else
                            <option value="{{$state->id}}">{{$state->description}}</option>
                        @endif
                    @else
                        <option value="{{$state->id}}">{{$state->description}}</option>
                    @endif
                @endforeach
            </select>
            @error('state_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="menu_type_id">Tipo de Menú</label>
            <select name="menu_type_id" id="menu_type_id" class="form-select">
                <option selected disabled>Seleccione</option>
                @foreach ($menu_types as $menu_type)
                    @if (isset($menu->state_id))
                        @if ($menu->menu_type_id == $menu_type->id )
                            <option value="{{$menu_type->id}}" selected>{{$menu_type->description}}</option> 
                        @else
                            <option value="{{$menu_type->id}}">{{$menu_type->description}}</option>
                        @endif
                    @else
                        <option value="{{$menu_type->id}}">{{$menu_type->description}}</option>
                    @endif
                @endforeach
            </select>
            @error('menu_type_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    

    <div class="d-flex justify-content-center col-sm-12">
        <input class="btn btn-dark me-4" type="submit" value="{{$Modo=='crear' ? 'Agregar': 'Modificar'}}">
        <a href="{{route('admin.menus.index')}}" class="btn btn-secondary text-dark">Regresar</a>
    </div>
    
</div>
