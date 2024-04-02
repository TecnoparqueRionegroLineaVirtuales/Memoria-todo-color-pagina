// Ejecutar funcion en el evento clic
document.getElementById('btn_open').addEventListener('click', open_close_menu);
//variables

var MenuLateral = document.getElementById('menuLateral');
var btn_open = document.getElementById('btn_open');
var contenedor = document.getElementById('contenedor');

//Evento mara mostrar y ocultar menu

function open_close_menu(){
    contenedor.classList.toggle('contenedor_move');
    MenuLateral.classList.toggle('menuLateral_move');
}

//Ocultar menu si la pagina es menor a 760px

if(window.innerWidth < 760){
    contenedor.classList.add('contenedor_move');
    MenuLateral.classList.add('menuLateral_move');
}

//Menu responsivo adaptable

window.addEventListener('resize', function(){
    if(this.window.innerWidth >760){
        contenedor.classList.remove('contenedor_move');
        MenuLateral.classList.remove('menuLateral_move');
    }

    if(this.window.innerWidth < 760){
        contenedor.classList.add('contenedor_move');
        MenuLateral.classList.add('menuLateral_move');
    }
});

var carouselWidth = $(".carousel-inner")[0].scrollWidth;

var cardWidth = $(".carousel-item").width();

var scrollPosition = 0;

$(".carousel-control-next").on("click", function () {
    if (scrollPosition < (carouselWidth - cardWidth * 4)) { //check if you can go any further
      scrollPosition += cardWidth;  //update scroll position
      $(".carousel-inner").animate({ scrollLeft: scrollPosition },600); //scroll left
    }
});

$(".carousel-control-prev").on("click", function () {
if (scrollPosition > 0) {
    scrollPosition -= cardWidth;
    $(".carousel-inner").animate(
    { scrollLeft: scrollPosition },
    600
    );
}
});

var multipleCardCarousel = document.querySelector(
    "#carouselExampleControls"
    );
if (window.matchMedia("(min-width: 768px)").matches) {
    //rest of the code
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false
});
} else {
$(multipleCardCarousel).addClass("slide");
}

var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false,
    wrap: false,
});

