<div>
    <div class="container mt-5">
        <div class="row bg-white rounded shadow p-5">
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
                            <div>
                                <p>Debes de iniciar sesion para poder comprar</p>
                            </div>
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
