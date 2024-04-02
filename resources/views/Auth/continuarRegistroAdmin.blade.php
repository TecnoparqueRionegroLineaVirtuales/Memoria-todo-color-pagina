@extends('layouts.templateAdmin')

@section('title', 'Panel Administrativo')

@section('content')
    <div class="contenedor" id="contenedor">

        <div class="d-flex">

            {{--Menú Lateral--}}
            <div class="menuLateral" id="menuLateral">

                <header>@include('layouts.navAdmin')</header>

                   {{--contenido--}}
                   <div id="content">
                        <section class="py-5">
                             <div class="container">
                                <div class="row justify-content-center">
                                    
                                    <div class="col-md-6">
                                        <h2>Continuar registro usuario</h2>
                                        <form id="registration-form" action="{{ route('dataUsersAdmin')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nombre:</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese su Nombre">
                                                <span id="name-error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Apellido:</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Ingrese su Apellido">
                                                <span id="last-name-error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Género:</label>
                                                <span id="gender-error" class="text-danger"></span>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Masculino">
                                                    <label class="form-check-label" for="male">
                                                        Masculino
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino">
                                                    <label class="form-check-label" for="female">
                                                        Femenino
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Telefono:</label>
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Ingrese su telefono">
                                                <span id="phone-error" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label mt-2">Foto de perfil:</label>
                                                <input class="form-control" type="file" name="profile">
                                            </div>

                                            <input type="hidden" value="{{ session('id') }}" name="id_user">
                                            <input type="hidden" value="{{ session('user_type_id') }}" name="user_type_id">
                                           
                                            <input type="submit" class="btn btn-dark btn-block" value="Terminar Registro">
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
