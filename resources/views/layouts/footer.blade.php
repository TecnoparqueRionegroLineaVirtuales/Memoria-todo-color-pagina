<footer class="text-white text-center text-lg-start"  style="background-color: rgba(0, 0, 0, 0.37);">
    <div class="container p-1">
        <div class="row mt-4">
            <h5 class="text text-center fs-2 mb-5">Contáctanos</h5>
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
    
                <ul class="fa-ul" style="margin-left: 1.65em;">
                    <li class="mb-3">
                        <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">Correo electrónico: ejemplo@ejemplo.com</span>
                    </li>
                    <li class="mb-3">
                        <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">Teléfono: 123-456-7890</span>
                    </li>
                    <li class="mb-3">
                        <span class="fa-li"><i class="fas fa-map-marker-alt"></i></span><span class="ms-2">Dirección: 123 Calle Ejemplo, Ciudad Ejemplo, Estado Ejemplo.</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <form action="{{route('contactanos.store')}}" method="post" id="form-contact">
                    @csrf
                    <div class="input-group gap-2 mb-2">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Nombre:" >
                    @error('nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Email:">
                    @error('correo')
                        <small class="text-danger">{{$message}}</small>
                    @enderror    
                    </div>

                    <div class="mt-2">
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="2" value="{{old('mensaje')}}" placeholder="Tú mensaje:"></textarea>
                            @error('mensaje')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="d-grid mt-2">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="container">
                <section class="text-center text-white">
                    <div class="border-bottom border-warning mb-3 mt-5">

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-outline-light btn-floating rounded-circle m-1 mb-3" href="#!" role="button"
                        style="width: 5%;"><i class="fab fa-facebook-f"></i>
                        </a>

                        <!-- Youtube -->
                        <a class="btn btn-primary btn-outline-light btn-floating rounded-circle m-1 mb-3" href="#!" role="button"
                            style="width: 5%;"><i class="fab fa-youtube"></i>
                        </a>

                        <!-- Instagram -->
                        <a class="btn btn-primary btn-outline-light btn-floating rounded-circle m-1 mb-3" href="#!" role="button"
                            style="width: 5%;"><i class="fab fa-instagram"></i>
                        </a>

                        <!-- Twitter -->
                        <a class="btn btn-primary btn-outline-light btn-floating rounded-circle m-1 mb-3" href="#!" role="button"
                            style="width: 5%;"><i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </section>
                        
                <div class="text-center fs-6 mb-2">
                    © 2023 Memoria todo color. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </div>
</footer>



{{-- <footer class=" w-100 fixed-bottom" style="background-image: url('storage/img/fondo.png');">
    <div class="container text-light d-flex justify-content-center">
        <div class="row">

            <div class="col-md-6 justify-content w-50 p-3">
                <h4 class="footer-title"><i class=" ">Nosotros</i></h4>
                <ul class="list-unstyled ml-1">
                <li><i class="bi bi-envelope-fill me-2"><i class="fa-solid fa-envelope" style="margin-right: 10px"></i> Correo electrónico: ejemplo@ejemplo.com</i> </li>
                <li><i class="bi bi-telephone-fill me-2"><i class="fa-solid fa-mobile-screen" style="margin-right: 10px"></i> Teléfono: 123-456-7890</i></li>
                <li><i class="bi bi-geo-alt-fill me-2"><i class="fa-solid fa-location-dot" style="margin-right: 10px;"></i> Dirección: 123 Calle Ejemplo, Ciudad Ejemplo, Estado Ejemplo.</i> </li>
                </ul>
            </div>

            <div class="col-md-6 justify-content-center w-50 p-3 text-center">
                <h4><i class="footer-title text-center">Formulario de contacto</i></h4>

                <form action="{{route('contactanos.store')}}" method="post" id="form-contact">
                    @csrf
                    <div class="mt-2">
                        <label for="nombre" class=""><i class="bi bi-envelope-fill me-2"></i></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Nombre:" >
                            @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="mt-2">
                        <label for="correo" class=""><i class="bi bi-envelope-fill me-2"></i></label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Email:">
                            @error('correo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="mt-2">
                        <label for="mensaje" class=""><i class="bi bi-envelope-fill me-2"></i></label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="2" value="{{old('mensaje')}}" placeholder="Mensaje:"></textarea>
                            @error('mensaje')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>

                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" class="btn btn-primary mt-1" >Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="font-family: 'Roboto', sans-serif; background-color: #000000; color: #fff; text-align: center;">
        <hr>
        © 2023 Memoria todo color. Todos los derechos reservados.
    </div>
</footer> --}}

