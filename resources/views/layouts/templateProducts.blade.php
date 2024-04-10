<div>
    <div class="container mt-5">
        <div class="row bg-white rounded shadow p-5" id="boxProduct">
            <div class="col-xxl-6 col-sm-12 mb-3" style="width: 30rem;">
                <img class="object-fit-scale w-100 h-100" src="{{ $product->files->route }}">
            </div>
            
            <div class="d-flex align-items-center col-xxl-6 col-sm-12">
                <div>
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <h2>$ {{ number_format($product->price, 0, ',', '.')}}</h2>
                    <div class="d-flex">
                        @if (auth()->check())
                            @yield('buttons')
                            <a href="{{ route('pay.index', $product) }}">
                                <button class="btn btn-dark">Comprar</button>
                            </a>
                            <form action="{{ route('cart.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                <button class="btn btn-dark mx-2">Añadir al carrito</button>
                            </form>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        @else
                        <a href="{{ route('login')}}">
                            <div style="border:2px solid rgba(8, 31, 68, 0.886); margin-left:20vh; background: rgba(21, 70, 150, 0.657); border-radius:5%"
                                
                                    <button class="btn fw-bold w-100" style=" font-size: 20px;  ">
                                        Ingresa para comprar!
                                    </button>
                                
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3">
            <a href="{{ route('products.index') }}">
                <button class="btn btn-dark">Regresar</button>
            </a>
        </div>
    </div>
</div>
