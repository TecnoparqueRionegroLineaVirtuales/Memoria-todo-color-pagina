
<div>
    <div class="row">
        <x-head.tinymce-config/>
        <div class="mb-3 col-lg-12">
            <label for="html" class="form-label">Contenido HTML</label>
            <textarea id="myeditorinstance" class="form-control" id="html" name="html" rows="3" >{{isset($article->html)? $article->html: ""}}</textarea>
            @error('html')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
    </div>

    <div class="row mb-3">
        <div class="mb-3 col-lg-6">
            <label for="title" class="form-label">Título</label>
            <input class="form-control" type="text" name="title" placeholder="Título de artículo" value="{{isset($article->title)? $article->title: ""}}">
            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="col-lg-6">
            <label for="state_id">Estado</label>
            <select name="state_id" id="state_id" class="form-select">
                <option selected disabled>Seleccione Estado</option>
                @foreach ($states as $state)
                    @if (isset($article->id))
                        @if ($state->id == $article->state_id)
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
    </div>
    <div class="d-flex justify-content-center col-sm-12">
        <input class="btn btn-dark me-4" type="submit" value="{{$Modo=='crear' ? 'Agregar': 'Modificar'}}">
        <a href="{{route('admin.articles.index')}}" class="btn btn-secondary text-dark">Regresar</a>
    </div>
</div>
