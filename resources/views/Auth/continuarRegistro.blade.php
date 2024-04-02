@extends('layouts.template')

@section('title', 'Tienda')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h2 class="text-center">Continua con tu registro</h2>
        </div>
          <div class="card-body">
                <form id="registration-form" action="{{ route('dataUsers')}}" method="post" enctype="multipart/form-data" onsubmit="return validarRegistro()">
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
            <input type="hidden" name="formAdmin" value="2">
            <input type="submit" class="btn btn-dark btn-block" value="Terminar Registro">
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function validarRegistro() {
  // Obtener los valores de los campos del formulario
  var name = document.getElementById("name").value.trim();
  var last_name = document.getElementById("last_name").value.trim();
  var gender = document.querySelector('input[name="gender"]:checked');
  var phone = document.getElementById("phone").value.trim();

  // Obtener los elementos HTML para mostrar los mensajes de validación
  var nameError = document.getElementById("name-error");
  var lastNameError = document.getElementById("last-name-error");
  var genderError = document.getElementById("gender-error");
  var phoneError = document.getElementById("phone-error");

  // Reiniciar los mensajes de validación
  nameError.innerHTML = "";
  lastNameError.innerHTML = "";
  genderError.innerHTML = "";
  phoneError.innerHTML = "";

  // Validar cada campo y mostrar los mensajes de validación correspondientes
  if (name === "") {
    nameError.innerHTML = "Por favor, ingrese su nombre.";
  }
  if (last_name === "") {
    lastNameError.innerHTML = "Por favor, ingrese su apellido.";
  }
  if (gender === null) {
    genderError.innerHTML = "Por favor, seleccione su género.";
  }
  if (phone === "") {
    phoneError.innerHTML = "Por favor, ingrese su teléfono.";
  }

  // Verificar si hay mensajes de validación y detener el envío del formulario
  if (nameError.innerHTML !== "" || lastNameError.innerHTML !== "" || genderError.innerHTML !== "" || phoneError.innerHTML !== "") {
    return false;
  }

  // Si todos los campos están completos, devolver "true" para enviar el formulario
  return true;
}

</script>

@endsection