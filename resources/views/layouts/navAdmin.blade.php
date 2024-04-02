                <div class="opciones_menu">
                    <a href="#" class="text-decoration-none text-white">
                        <div class="opcion">
                            <i class="fa-solid fa-bars lead" title="Menús"></i>
                            <h4 >Menús</h4>
                        </div>
                    </a>

                    <a href="{{route('admin.articles.index')}}" class="text-decoration-none text-white">
                        <div class="opcion">
                            <i class="fa-solid fa-newspaper lead" title="Artículos"></i>
                            <h4>Contenido</h4>
                        </div>
                    </a>

                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="opcion">
                            <i class="fa-solid fa-cart-shopping lead" title="Tienda"></i>
                            <h4>Tienda</h4>
                        </div>
                    </a>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body bg-black">
                            <ul class="style-none">
                                <li class=""> <a href="" class="text-white text-decoration-none  fs-5 subMenu">Productos</a></li>
                                <hr class="linea"></li>
                                <li style="text-decoration: none;"><a href="" class="text-white text-decoration-none fs-5 subMenu">Categoría</a></li>
                                <li><hr class="linea"></li>
                            </ul>
                        </div>
                      </div>

                      <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#collapseGaleria" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="opcion">
                            <i class="fa-solid fa-photo-film lead" title="Tienda"></i>
                            <h4>Galería</h4>
                        </div>
                    </a>
                      <div class="collapse" id="collapseGaleria">
                        <div class="card card-body bg-black">
                            <ul class="style-none">
                                <li class=""> <a href="{{ route('admin.files.index') }}" class="text-white text-decoration-none  fs-5 subMenu">Multimedia</a></li>
                                <hr class="linea"></li>
                                <li style="text-decoration: none;"><a href="{{route('admin.galleries.index')}}" class="text-white text-decoration-none fs-5 subMenu">Categoría</a></li>
                                <li><hr class="linea"></li>
                            </ul>
                        </div>
                      </div>

                </div>
        </div>


            {{--navbar--}}
            <div class="w-100">
                <nav class="navbar navbar-expand-lg navPanelAdmin">
                        <div class="container-fluid">
                            <div class="icon_menu">
                                <i class="fa-solid fa-arrow-right text-white lead me-3" id="btn_open"></i>
                            </div>
                            <div class="logo me-5">
                                <img class="img-fluid" src="{{asset('img/logo.png')}}" alt="">
                            </div>
                                <i class="fa-solid fa-gears mx-3 lead text-white"></i><a class="navbar-brand text-white">Panel Administrativo</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class=""><i class="fa-solid fa-bars text-white"></i></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                                <div class="d-flex me-5" >
                                    <ul class="navbar-nav me-auto mb-2" >
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-white" aria-current="page" href="{{url('/admin')}}">Inicio <i class="fa-solid fa-house mx-1 text-white"></i></a>
                                        </li>
                                        <li class="nav-item dropdown mt-2">
                                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                                                <img src="{{asset('img/user.png')}}" class="avatar mx-2" alt="">{{  Auth::user()->email }}</a>
                                            <ul class="dropdown-menu" style="background: black">
                                                <li class="nav-item">
                                                    <a class="nav-link  text-white" aria-current="page" href="{{ route('signOut')}}">Cerrar Sesión <i class="fa-solid fa-right-from-bracket mx-1 text-white"></i></a>
                                                </li>
                                            {{-- <li><hr class="dropdown-divider"></li> --}}
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   </nav>