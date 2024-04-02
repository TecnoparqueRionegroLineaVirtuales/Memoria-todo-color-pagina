@extends('layouts.template')
@extends('layouts.nav')
@section('title', 'Editar datos')

@section('content')
    <div id="content">
        <section class="py-5">
            <div class="container d-flex justify-content-center">
                <div class="card w-75 col-sm-12">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                            <form method="post" action="{{ route('user_profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h2>Actualizar datos de usuario</h2>
                            <div class="form-group mb-3">
                                <label for="tipo-usuario">Correo</label>
                                <input type="text" class="form-control" id="tipo-usuario" value="{{ Auth::user()->email }}" disabled>
                            </div>

                            @foreach ($data_user as $data)
                                
                                <div class="form-group mb-3">
                                        <div class="mb-3">
                                            <label for="tipo-usuario">Nombre</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->name }}" name="name">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Apellido</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->last_name }}" name="last_name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Género:</label>
                                            <span id="gender-error" class="text-danger"></span>
                                            <div class="form-check">
                                                <input selected class="form-check-input" type="radio" name="gender" id="male" value="Masculino" @if($data->gender == "Masculino") checked @endif>
                                                <label class="form-check-label" for="male">
                                                    Masculino
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino" @if($data->gender == "Femenino") checked @endif>
                                                <label class="form-check-label" for="female">
                                                    Femenino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Teléfono</label>
                                            <input type="number" class="form-control" id="tipo-usuario" value="{{ $data->phone }}" name="phone">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Biografía</label>
                                            <textarea class="form-control" name="biography" rows="5">{{ $data->biography }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mt-2">Foto de perfil:</label>
                                            <input class="form-control" type="file" name="profile">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Redes sociales</label>

                                            <div class="d-flex align-items-center gap-2 mt-3">
                                                <i class="fa-brands fa-facebook fa-2x" style="color: #3b5998;"></i>
                                                <input type="text" class="form-control" name="facebook" @if ($facebook == null) placeholder="Link de tu Facebook" @else value="{{ $facebook->link }}" @endif>
                                            </div>

                                            <div class="d-flex align-items-center gap-2 mt-3">
                                                <i class="fa-brands fa-youtube fa-2x" style="color: #c4302b;"></i>
                                                <input type="text" class="form-control mb-2" name="youtube" @if ($youtube == null) placeholder="Link de tu canal de Youtube" @else value="{{ $youtube->link }}" @endif>
                                            </div>

                                            <div class="d-flex align-items-center gap-2 mt-3">
                                                <i class="fa-brands fa-square-instagram fa-2x" style="color: #E1306C;"></i>
                                                <input type="text" class="form-control mb-2" name="instagram" @if ($instagram == null) placeholder="Link de tu Instagram" @else value="{{ $instagram->link }}" @endif>
                                            </div>

                                            <div class="d-flex align-items-center gap-2 mt-3">
                                                <i class="fa-brands fa-twitter fa-2x" style="color: #00acee;"></i>
                                                <input type="text" class="form-control mb-2" name="twitter" @if ($twitter == null) placeholder="Link de tu twitter" @else value="{{ $twitter->link }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="form-group mb-3">
                                <button class="btn btn-dark" type="submit">Guardar cambios</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection