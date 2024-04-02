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
                                  @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                      {{ $errors->first('email') }}
                                    </div>
                                  @endif
                                    <div class="col-md-6">
                                        <h2>Registrar usuario</h2>
                                        <form class="needs-validation" method="post" action="{{ url('auth/registroVerify')}}" novalidate>
                                            @csrf
                                                  <div class="mb-3">
                                                    <label for="email">Correo electrónico:</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" required>
                                                    <div class="invalid-feedback">
                                                      Por favor ingrese una dirección de correo electrónico válida.
                                                    </div>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="password1">Contraseña:</label>
                                                    <input type="password" class="form-control" name="password" id="password1" placeholder="Ingrese su contraseña" required>
                                                    <div class="invalid-feedback">
                                                      Por favor ingrese una contraseña.
                                                    </div>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="password2">Confirmar contraseña:</label>
                                                    <input type="password" class="form-control" name="passwordConfirmation" id="password2" placeholder="Confirme su contraseña" required data-match="#password1">
                                                    <div class="invalid-feedback">
                                                      Por favor confirme su contraseña.
                                                    </div>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="password2">Tipo de usuario</label>
                                                    
                                                    <select name="user_type_id" id="" class="form-control">
                                                        @foreach($user_types as $user)
                                                        <option value="{{ $user->id}}">{{ $user->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="formAdmin" value="1">
                                                    <div class="invalid-feedback">
                                                      Por favor confirme su contraseña.
                                                    </div>
                                                  </div>
                                                  <button type="submit" class="btn btn-dark btn-block">Registrar</button>
                                                </form>

                                    </div>
                                </div>
                            </div>
                        </section>
             </div>
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


