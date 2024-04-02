@extends('layouts.template')

@section('title', 'Registro')

@section('content')


<div class="container w-75 mt-5 rounded shadow position-absolute top-50 start-50 translate-middle">
    <div class="row align-items-stretch">

        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            <img  src="{{ URL::asset('storage/img/logo.png') }}" style="width: 100%; height:100%; background-position: center center;">
        </div>

        <div class="col bg-white p-5 rounded border border-warning border-3">
            {{-- <div class="text-end">

            </div> --}}
            <div class="card-header text-dark  text-center  border-bottom">
                <h2 class="text-center">Registrate</h2>
            </div>
            {{-- <h2 class="fw-bold text-center py-5">Inicio de sesión</h2> --}}
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <form class="needs-validation" method="post" action="{{ url('auth/registroVerify')}}" novalidate>
            @csrf
                <div class="mb-2 mt-4">
                    <label for="email">Correo electrónico :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" required>
                    <div class="invalid-feedback">
                        Por favor ingrese una dirección de correo electrónico válida.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password1">Contraseña :</label>
                    <input type="password" class="form-control" name="password" id="password1" placeholder="Ingrese su contraseña" required>
                    <div class="invalid-feedback">
                        Por favor ingrese una contraseña.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password2">Confirmar contraseña :</label>
                    <input type="password" class="form-control" name="passwordConfirmation" id="password2" placeholder="Confirme su contraseña" required data-match="#password1">
                    <input type="hidden" name="user_type_id" value="2">
                    <div class="invalid-feedback">
                        Por favor confirme su contraseña.
                    </div>
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-block text-white" style="background-color: #009ef5;">Registrate</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    //validacion de campos
    (function() {

  'use strict';


  var forms = document.querySelectorAll('.needs-validation');


  Array.prototype.slice.call(forms)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }


        if (form.querySelector('#password1').value !== form.querySelector('#password2').value) {
          form.querySelector('#password2').setCustomValidity("Las contraseñas no coinciden");
        } else {
          form.querySelector('#password2').setCustomValidity("");
        }

        form.classList.add('was-validated');
      }, false);
    });
})();

</script>
@endsection
