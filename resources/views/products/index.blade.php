@extends('layouts.template')

@extends('layouts.nav')

@section('title', 'Tienda')

@section('content')
    <style>
        .card{
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>

    <body class="bg-body-secondary">
        <div class="container">
            @if ($products->isEmpty())
                <h1 class="text-center">Aún no hay productos.</h1>
            @else
                <div class="container">
                    <form action="{{ route('products.index') }}" method="GET">
                        <div class="d-flex text-center">
                            <input type="text" name="search" class="form-control" placeholder="Buscar" value="{{ $search }}">
                            <button type="submit" class="btn btn-dark mx-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                @if ($productSearch->isEmpty())
                    <h1 class="mt-3 text-center">No hay resultados.</h1>
                @else
                    <div class="row">
                        @foreach ($productSearch as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <a class="text-decoration-none" href="{{ route('products.show', $product) }}">
                                    <div class="card my-3">
                                        <div style="height: 200px;">
                                            <img src="{{ URL::asset($product->files->route) }}" class="object-fit-cover card-img-top w-100 h-100">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">$ {{ number_format($product->price, 0, ',', '.')}}</p>
                                            <p class="card-text">{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
            {{ $productSearch->links() }}
        </div>
    </body>
@endsection
