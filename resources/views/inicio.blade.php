@extends('layouts.template')
@include('layouts.nav')
@section('title', 'Inicio')

<!-- body -->

<body>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        $(document).ready(function() {
           $('#carouselExampleInterval').on('slide.bs.carousel', function() {
              $('video').each(function() {
                 $(this).get(0).pause();
              });
           });
        });
     </script>
    <script>
        // Crea un objeto de reproductor de YouTube
        var player;
        function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
            videoId: 'kCsxgz-odeo',
            playerVars: {
              'autoplay': 1,
              'controls': 0,
              'disablekb': 1,
              'enablejsapi': 1,
              'loop': 1,
              'modestbranding': 1,
              'rel': 0,
              'showinfo': 0
            },
            events: {
              'onReady': onPlayerReady,
              'onStateChange': onPlayerStateChange
            }
          });
        }
      
        // Se llama cuando el reproductor de YouTube está listo
        function onPlayerReady(event) {
          event.target.playVideo();
        }
      
        // Se llama cuando el estado del reproductor de YouTube cambia
        function onPlayerStateChange(event) {
          // Si el video termina, lo reproducimos de nuevo
          if (event.data === YT.PlayerState.ENDED) {
            player.seekTo(0);
            player.playVideo();
          }
        }
      </script>
      
    <section class="section">
        <div id="carouselExampleInterval" class="carousel slide w-100 h-100 col-sm-12 col-md-8 col-lg-6 mx-auto" data-bs-ride="carousel">
           <div class="carousel-inner">
            <div id="player" class="carousel-item active" style="height: 700px;" data-bs-interval="7000">
                <iframe width="1920" height="800" src="https://www.youtube.com/embed/kCsxgz-odeo?autoplay=1" title="TURISMO SAN CARLOS" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
              <div class="carousel-item" data-bs-interval="7000">
                 <img src="{{ URL::asset('storage/img/slide2.jpg') }}" class="d-block w-100" style="max-height: 700px;" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="7000">
                 <img src="{{ URL::asset('storage/img/slide3.jpg') }}" class="d-block w-100" style="max-height: 700px;" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="7000">
                 <img src="{{ URL::asset('storage/img/slide4.jpg') }}" class="d-block w-100" style="max-height: 700px;" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="7000">
                 <img src="{{ URL::asset('storage/img/slide5.jpg') }}" class="d-block w-100" style="max-height: 700px;" alt="...">
              </div>
           </div>
           <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
           </button>
        </div>
     </section>
     


        <!-- description -->

        <div class="section mt-5">
            <div class="container p-1">
                <div class="" style="text-align: center;">
                    <img src="{{ URL::asset('storage/img/logo.png') }}">
                </div>
                <div class="w-100 text-justify mt-4 mb-4" style="color: rgb(250, 250, 250);">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                San Carlos es un municipio en el departamento de Antioquia, Colombia, fundado en 1786.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                Es conocido por su riqueza hidrológica y ambiental, con 7 cuencas y 76 quebradas
                                cristalinas que surten los embalses de Punchiná, Calderas y Playas,
                                generando el 30% de la energía del sistema eléctrico nacional.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                Su biodiversidad lo ha hecho ser reconocido como municipio Verde de Colombia.
                                El territorio es predominantemente montañoso, con algunas áreas planas cerca del río San Carlos.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                Según proyecciones del DANE, la población en 2023 será de 16.559 personas,
                                con una fuerte presencia rural que influye en su cultura y economía.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                El conflicto en Colombia ha afectado a muchas personas, incluyendo a 16.196 víctimas declaradas en San Carlos.
                                En cuanto a la composición étnica del municipio, el censo del DANE de 2018 indica que el
                                0.35% de la población es indígena o afrocolombiana.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                El muralismo en San Carlos, Colombia, comenzó en 2009 después de la desmovilización de las autodefensas
                                y el retorno de los Sancarlitanos desplazados. Ahora es reconocido a nivel nacional e internacional
                                como la galería artística de la memoria al aire libre más grande del Oriente Antioqueño.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                La pintura de murales en San Carlos surgió de la necesidad de resignificar las paredes marcadas con grafitis
                                de propaganda de guerra y represión social. Estos grafitis generaban perturbaciones psicológicas en la
                                comunidad y perpetuaban el conflicto.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ URL::asset('storage/img/2.jpg') }}" class="d-block w-100"  alt="...">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                                <img src="{{ URL::asset('storage/img/1.jpg') }}" class="d-block w-100"  alt="...">
                        </div>
                        <div class="col-md-6">
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                En 2010, el colectivo de artistas “Memoria de Sueños y Esperanzas” comenzó a pintar murales en San Carlos
                                con sus propios recursos. Los murales representaban las historias de las comunidades y su cultura.
                                En 2012, las instituciones reconocieron el valor de los murales para transformar los
                                imaginarios del conflicto y reconstruir la memoria histórica.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                En 2018, la “Corporación Memoria de Sueños y Esperanzas” realizó el primer encuentro internacional
                                de muralismo por la Paz “Memoria a Todo Color”. El objetivo es recuperar la memoria histórica y
                                contribuir a los procesos de paz. Actualmente, San Carlos tiene más de 124 murales y una ruta
                                turística “Tour Memoria a Todo Color”.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                Los murales en San Carlos han jugado un papel fundamental en la reconstrucción de la memoria histórica
                                y el tejido social. Reflejan la capacidad de perdón, reconciliación y resiliencia de las comunidades.
                                San Carlos es reconocido por sus más de 124 murales como patrimonio histórico y cultural.
                            </p>
                            <p class="fw-semibold fs-4 fst-normal" style="text-align:justify;">
                                El proyecto “Murales Vivos” busca promocionar la memoria y la historia de San Carlos a través de
                                la realidad aumentada. Esto permite impulsar la ruta turística y cultural “Memoria a Todo Color”
                                y los encuentros internacionales de muralismo por la paz.
                            </p>
                            
                            
                        </div>
                      </div>
                </div>
            </div>
        </div>
    @extends('layouts.footer')




