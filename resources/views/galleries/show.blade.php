@extends('layouts.template')

@extends('layouts.nav')

@section('title', $category->description)

@section('content')

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style>
    .image{
      transition: 300ms;
    }

    .image:hover{
      filter: brightness(50%);
    }
  </style>

  <div class="container">
    @if ($files->isEmpty())
    <div style="height: 20rem;">
      <h1 class="text-center text-white">Aún no hay imágenes en {{ $category->description }}</h1>
    </div>
    @else

      <section class="gallery mt-5">
        <div class="container-lg">
          <div class="row">
              @foreach ($files as $file)
              <div class="col-xxl-3 col-md-6 col-sm-12 mb-3" style="height: 17rem;" data-bs-toggle="modal" data-bs-target="#modal{{ $file->id }}">
                <img class="image w-100 h-100 rounded object-fit-cover" src="{{ URL::asset($file->route) }}">
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modal{{ $file->id }}" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-body w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="{{ URL::asset($file->route) }}">
                  </div>
                </div>
              </div>

              @endforeach
          </div>
        </div>
      </section>
    @endif
  </div>
  <script src="js/main.js"></script>
@endsection
