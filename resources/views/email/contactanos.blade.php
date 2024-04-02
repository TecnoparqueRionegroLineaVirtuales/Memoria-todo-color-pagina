<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            
            <title>Document</title>
        </head>

        <style>
            *{
                font-family: 'Roboto';
                justify-content: center;
            }

            .tituloCorreo{
                background: black;
                padding: 10px;
                margin: 20px 50px;
                color: white;
                text-align: center;
            }

            .titulo{
                font-size: 40px;
            }
            p{
                font-size: 26px;
            }

            .contenidoMensaje{
                border: 1px solid rgb(199, 194, 194);
                margin: 50px;
                border-radius: 10px;
                padding-left: 50px;
            }

            .parrafo{
                font-size: 18px;
            }
        </style>
        <body>
            <div class="container">
                {{--contenido del correo--}}
                <header class="tituloCorreo">
                    <div class="container bg-black text-white text-center p-3">
                        <h1 class="titulo">Recibiste un mensaje de {{$datos['nombre']}}</h1>
                        <p class="4">esta interesado en saber más sobre Memoria a Todo Color</p>
                    </div>
                </header>
                 <div class="contenidoMensaje">
                    <p class="">Asunto: {{$datos['mensaje']}}</p>

                    <p class="parrafo">Comparto mis datos para que se ponga en contacto, muchas gracias.</p>
                    <p class="">Nombre: {{$datos['nombre']}}</p>
                    <p class="">Correo:{{$datos['correo']}}</p>
                </div>
            </div>
        </body>
</html>