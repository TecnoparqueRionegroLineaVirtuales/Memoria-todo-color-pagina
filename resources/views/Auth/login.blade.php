@extends('layouts.template')
@extends('layouts.nav')
@section('title', 'Login')

@section('content')


<div class="container w-75 mt-5 rounded shadow position-absolute top-50 start-50 translate-middle">
    <div class="row align-items-stretch">

        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            <img  src="{{ URL::asset('storage/img/logo.png') }}" style="width: 100%; height:100%; background-position: center center;">
        </div>

        <div class="col bg-white p-4 rounded border border-warning border-3">
            {{-- <div class="text-end">

            </div> --}}
            <div class="card-header text-dark  text-center  border-bottom">
                <h2 class="text-center">Inicio de sesión</h2>
            </div>
            {{-- <h2 class="fw-bold text-center py-5">Inicio de sesión</h2> --}}

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.loginVerify')}}" method="POST">
                @csrf
                <div class="mb-2 mt-4">
                    <label for="email" class="form-label">Correo electrónico : </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña : </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="">
                    <button type="submit" class="btn text-white" style="background-color: #009ef5; ">Iniciar sesión</button>
                </div>


                <div class="my-3">
                    <span>¿No tienes cuenta? <a href="{{ url('auth/registro')}}"> Regístrate aquí</a></span><br>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
