<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('styles/index.css') }}"> 
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@900&display=swap" rel="stylesheet">
    <title>Memoria todo color</title>
</head>
<body>
    <div class="w-100 h-100">
        <!-- <img class="position-absolute m-3" style="z-index: 1; width: 200px;" src="{{ URL::asset('storage/img/logo.png') }}"> -->
        <img class="position-absolute img-fluid w-100 h-100 object-fit-fill" src="{{ URL::asset('storage/img/mask.png') }}">
        <img class="position-absolute img-fluid w-100 h-100 object-fit-cover" style="z-index: -1;" src="{{ URL::asset('storage/img/background.jpg') }}">

        <div class="mx-5 fw-bold" style="position: absolute; top: 30%;">
            <div style="-webkit-text-stroke: 3px white; color: transparent; font-family: 'Noto Sans', sans-serif;">
                <h1 style="font-size: 60px;">Descubre San</h1>
                <h1 style="font-size: 60px;">Carlos</h1>
            </div>
            <div style="color: white; font-family: 'Noto Sans', sans-serif;">
                <h1 style="font-size: 60px;">Con Realidad</h1>
                <h1 style="font-size: 60px;">Aumentada</h1>
            </div>
            <a href="{{ route('inicio')}}">
            <button class="btn fw-bold w-75" style="background: linear-gradient(0deg, rgba(247,138,37,1) 0%, rgba(253,207,0,1) 100%); font-size: 20px; border-radius: 100px; border: none !important;">
                    Comencemos el Tour
                </button>
            </a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>