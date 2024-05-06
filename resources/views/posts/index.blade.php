@extends('layouts.template')

@include('layouts.nav')

@section('title', 'Rutas')

@section('content')



<div class="continer p-2 mb-2">
    <div class="w-100 h2 mx-auto mb-3 text-secondary text-center border-bottom border-secondary">
        Rutas
    </div>

    <div class="row">

        <div class="col-4">
          <div class="card">
            <img src="{{ URL::asset('storage/img/Ruta_Corta.png')}}" class="card-img-top" style="height: 200px;
            object-fit: cover;" alt="...">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                optio consequatur eligendi doloribus, non autem asperiores perspiciatis
                quasi similique iste ipsam voluptatum provident accusantium nostrum
                recusandae labore nemo adipisci aut.
              </p>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card">
            <img src="{{ URL::asset('storage/img/Ruta_Media.png')}}" class="card-img-top" style="height: 200px;
            object-fit: cover;" alt="...">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                optio consequatur eligendi doloribus, non autem asperiores perspiciatis
                quasi similique iste ipsam voluptatum provident accusantium nostrum
                recusandae labore nemo adipisci aut.
              </p>
            </div>
          </div>
        </div>

        <div class="col-4">
            <div class="card">
              <img src="{{ URL::asset('storage/img/Ruta_Larga.png')}}" class="card-img-top" style="height: 200px;
              object-fit: cover;" alt="...">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    optio consequatur eligendi doloribus, non autem asperiores perspiciatis
                    quasi similique iste ipsam voluptatum provident accusantium nostrum
                    recusandae labore nemo adipisci aut.
                  </p>
              </div>
            </div>
          </div>
      </div>

    </div>
</div>

@include('layouts.footer')

@endsection
