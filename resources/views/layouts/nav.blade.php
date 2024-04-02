{{-- <section class="section">
    <div class="w-100" style="z-index: 1;">
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid fw-bold fs-5" style="background-color: rgba(0, 0, 0, 0);">
                <div cl ass="col-2 d-flex" style="height: 5rem;">
                    <a class="navbar-brand " href="#">
                        <img src="{{ URL::asset('storage/img/logo.png') }}" class="mx-5 w-100 h-100 object-fit-scale" href="{{ url('/') }}">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse col-8 px-2" id="navbarSupportedContent">
    
                    <ul class="navbar-nav">
    
                        @foreach ($menus as $menu)
    
                        @if ($menu->title == "Carrito")
                            @if (auth()->check())
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ request()->routeIs($menu->route) ? 'border-bottom border-warning' : ''  }}"  aria-current="page" href="{{route($menu->route)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                </li>
                            @endif
                        @else
    
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs($menu->route) ? 'border-bottom border-warning' : ''  }}"  aria-current="page" href="{{route($menu->route)}}">{{$menu->title}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
    
                </div>
                @if (auth()->check())
                <div class="text-white">
                    <p>Bienvenido {{$username = Auth::user()->email }}</p>
    
                </div>
                <a class="btn border border-white text-white" href="{{ route('signOut')}}">Cerrar Sesión <i class="fa-solid fa-right-from-bracket mx-1 text-white"></i></a>
                @else
                <div class="2">
                    <a class="btn border border-white text-white" href="{{ route('login') }}">Ingresar</a>
                </div>
                @endif
            </div>
        </nav>
    </div>
</section>   --}}






<div class="w-100" style="z-index: 1;">
    <div style="width: 100%; height: 7rem; position: absolute;">
        <img class="w-100 h-100 object-fit-cover" src="{{ URL::asset('storage/img/fondo.png') }}">
    </div>
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid fw-bold fs-5" style="background-color: rgba(0, 0, 0, 0);">
            <div class="col-2 d-flex" style="height: 6.5rem;">
                <a class="navbar-brand " href="{{ route('inicio') }}">
                    <img src="{{ URL::asset('storage/img/logo.png') }}" class="mx-5 w-100 h-100 object-fit-scale">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse col-7 px-2" id="navbarSupportedContent">
                
                <ul class="navbar-nav">
                
                    @foreach ($menus as $menu)
                    
                    @if ($menu->title == "Carrito")
                        @if (auth()->check())
                            <li class="nav-item">
                                <a class="nav-link text-white {{ request()->routeIs($menu->route) ? 'border-bottom border-warning' : ''  }}"  aria-current="page" href="{{route($menu->route)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                            </li>
                        @endif
                    @else
                    
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs($menu->route) ? 'border-bottom border-warning' : ''  }}"  aria-current="page" href="{{route($menu->route)}}">{{$menu->title}}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                
            </div>
            @if (auth()->check())
            <div class="text-white col-3 d-flex">
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown"><i class="fa-solid fa-gear"></i></button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user_profile.edit', Auth::user()->id) }}">Editar perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route('signOut')}}">Cerrar sesión <i class="fa-solid fa-right-from-bracket mx-1 text-white"></i></a></li>
                    </ul>
                </div>
               <p>Bienvenido {{  Auth::user()->email }}</p>
            </div>
            @else
            <div class="col-3">
                <a class="btn border border-white text-white" href="{{ route('login') }}">Ingresar</a>
            </div>
            @endif
        </div>
    </nav>
</div>
