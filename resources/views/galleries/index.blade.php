@extends('layouts.template')

@extends('layouts.nav')

@section('title', 'Murales')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

@if ($categoryFiles->isEmpty())
<div style="height: 30rem;">
    <h1 class="text-center text-white">Aún no hay galerías</h1>
</div>
@else
<div class="container">
    <div class="w-100 h2 pb-2 mx-auto text-white-50 border-bottom border-secondary">
        Albúm de murales
    </div>
    <div class="row">
        @foreach ($categoryFiles as $category)
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3 mb-3">
            <a href="{{ route('galleries.show', $category) }}" class="text-decoration-none">
            <div class="card text-black-50">
                @if ($files[$loop->iteration-1] == null)
                <div class="d-flex align-items-center justify-content-center text-secondary card-header" style="height: 200px;">
                    <h3>VACÍO</h3>
                </div>
                <p class="card-text p-3">{{ $category->description }}</p>
                @else
                <div style="height: 200px;">
                    <img src="{{ URL::asset($files[$loop->iteration-1]->route) }}" class="w-100 h-100 object-fit-cover card-img-top">
                </div>
                <p class="card-text p-3">{{ $category->description }}</p>
                @endif
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="container mt-5">
    <div class="w-100  h2  pb-2  mx-auto text-white-50 border-bottom border-secondary">
        Nuestros artistas vinculados
    </div>
        <div class="owl-carousel text-center">
            @foreach ($artists as $artist) 
                <div class="card item my-5">
                    <div class="position-relative d-flex justify-content-center p-4 card-header" style="background-color: #120A33;">
                        <div class="card-img bg-white p-1" style="width: 150px; height: 150px; border-radius: 50%;">
                            @if ($artist->file == null)
                                <img class="w-100 h-100 object-fit-cover" style="border-radius: 50%; border: 4px solid #120A33;" src="{{ URL::asset('storage/img/user1.png') }}">
                            @else
                                <img class="w-100 h-100 object-fit-cover" style="border-radius: 50%; border: 4px solid #120A33;" src="{{ URL::asset($artist->file) }}">
                            @endif
                        </div>
                    </div>

                    <div class="card-content text-center p-4">
                        <h2>{{ $artist->name }}</h2>
                        <p class="overflow-auto" style="height: 150px;">{{ $artist->biography }}</p>
                        <div class="d-flex justify-content-center gap-4">
                            @forelse ($social as $link)
                                @if ($link->user_id == $artist->users->id)
                                    @switch($link->social_type_id)
                                        @case(1)
                                            <div class="d-flex justify-content-center align-items-center" style="width: 48px; height: 48px; background-color: #120A33; border-radius: 50%;">
                                                <a class="text-white" href="{{ $link->link }}" target="_blank"><i class="{{ $link->socialType->icon_link }} fa-lg"></i></a>
                                            </div>
                                            @break
                                            
                                        @case(2)
                                            <div class="d-flex justify-content-center align-items-center" style="width: 48px; height: 48px; background-color: #120A33; border-radius: 50%;">
                                                <a class="text-white" href="{{ $link->link }}" target="_blank"><i class="{{ $link->socialType->icon_link }} fa-lg"></i></a>
                                            </div>
                                            @break

                                        @case(3)
                                            <div class="d-flex justify-content-center align-items-center" style="width: 48px; height: 48px; background-color: #120A33; border-radius: 50%;">
                                                <a class="text-white" href="{{ $link->link }}" target="_blank"><i class="{{ $link->socialType->icon_link }} fa-lg"></i></a>
                                            </div>
                                            @break

                                        @case(4)
                                            <div class="d-flex justify-content-center align-items-center" style="width: 48px; height: 48px; background-color: #120A33; border-radius: 50%;">
                                                <a class="text-white" href="{{ $link->link }}" target="_blank"><i class="{{ $link->socialType->icon_link }} fa-lg"></i></a>
                                            </div>
                                            @break

                                        @default
                                            
                                    @endswitch
                                @endif
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>


<script>
$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1200: {
            items: 3
        }
    }
})
</script>
@endsection


