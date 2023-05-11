<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SiGALSS</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

            .bg {
              /* The image used */

              background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("/imagens/fundo.jpg");

              filter: blur(6px);
                -webkit-filter: blur(6px);

              /* Full height */
              height: 100%;

              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            .imagem{
                position: absolute;
                width: 300px;
                position: absolute;
              top: 20%;
              left: 50%;
              transform: translate(-50%, -50%);
              z-index: 2;
              padding: 20px;
              text-align: center;
            }
            .bg-text {
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
              color: white;
              font-weight: bold;
              border: 3px solid #f1f1f1;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              z-index: 2;
              width: 80%;
              padding: 20px;
              text-align: center;
            }

        </style>
    </head>
    <body>

        <div class="bg">
            
        </div>
        <img class="circle responsive-img imagem" src="imagens/alss.png">
        <div class="bg-text">
          <h5>Bem Vindo a</h2>
          <h4 style="font-size:50px">Área de Lazer dos Suboficiais e Sargentos</h1>
          <a href="{{route('login')}}" class="btn-floating btn-large waves-effect waves-light blue accent-3 pulse"><i class="material-icons">screen_lock_landscape</i></a><br>
          <small>Entrar</small>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
