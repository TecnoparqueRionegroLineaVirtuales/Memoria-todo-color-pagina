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
                                    <form method="post" action="{{ route('user_types_register') }}">
                                    @csrf
                                        <h2>Formulario de ingreso de tipo de usuario</h2>
                                        <div class="form-group mb-3">
                                            <label for="tipo-usuario">Tipo de usuario</label>
                                            <input type="text" class="form-control" id="tipo-usuario" name="description">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="submit" class="btn btn-dark" value="Registrar"> 
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