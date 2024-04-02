@extends('layouts.templateAdmin')

@section('title', 'Editar Usuario')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>


                    {{--Aqui va el contenido a mostrar en la pagina--}}
                   <div id="content">
                        <section class="py-5">
                            <div class="container d-flex justify-content-center">
                                <div class="card w-75 col-sm-12">
                                    <div class="card-body">
                                    @foreach($data_user as $data)
                                        @if ($data->user_id == $user->id)
                                          <form method="post" action="{{ route('update-data-users', ['userId' => $user->id, 'dataUserId' => $data->id ])}}">
                                        @endif
                                    @endforeach
                                    @csrf
                                    @method('PUT')
                                        <h2>Actualizar datos de usuario</h2>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Correo</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $user->email}}" name="email">
                                        </div>
                                        <label for="tipo-usuario">Estado</label>
                                        <div class="mb-3">
                                            <select name="state_id" class="form-control">
                                                @foreach($State as $states)
                                                    @if ($states->id == $user->state_id)
                                                        <option selected value="{{ $states->id}}">{{ $states->description }}</option>
                                                    @else
                                                        <option value="{{ $states->id}}">{{ $states->description }}</option>  
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="tipo-usuario">Rol</label>
                                        <div class="mb-3">
                                            <select name="user_type_id" class="form-control">
                                                @foreach($user_types as $types)
                                                    @if ($types->id == $user->user_type_id)
                                                        <option selected value="{{ $types->id}}">{{ $types->description }}</option>
                                                    @else
                                                        <option value="{{ $types->id}}">{{ $types->description }}</option>  
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            @foreach($data_user as $data)
                                                    @if ($data->user_id == $user->id)
                                                        <label for="tipo-usuario">Nombre</label>
                                                        <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->name}}" name="name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Apellido</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->last_name}}" name="last_name">
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
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino" @if($data->gender == "Femenino") checked @endif">
                                                <label class="form-check-label" for="female">
                                                    Femenino
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Telefono</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->phone}}" name="phone">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Redes sociales</label>
                                            <input type="text" class="form-control" id="tipo-usuario" value="{{ $data->biography}}" name="biography">
                                        </div>
                                        @endif
                                        @endforeach
                                        <div class="form-group mb-3">
                                            <input type="submit" class="btn btn-dark" value="Continuar"> 
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>
@endsection
