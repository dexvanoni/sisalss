<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SiGAL') }}</title>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--INCLUSÃO DO BOOTSTRAP -->

      <link rel="stylesheet" href="{{URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"></script>

      <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-colvis-2.3.5/b-html5-2.3.5/b-print-2.3.5/datatables.min.css" rel="stylesheet"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
        
        body, html {
          height: 100%;
          position: relative;
          background-image: url('/imagens/bacg.png');
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          height: 100%;
        }
  
      .imagem {
        display: inline-block;
        width: 20%;
        margin: 0 auto;
        text-align: center;
      }
      </style>
</head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <img class="circle " style="width: 25%; padding-top: 5%" src="imagens/alma.png">
            </div>
            <div class="row">
            <div class="imagem">
              <img class="circle responsive-img " src="imagens/alss.png">
            </div>
            <div class="imagem">
              <img class="circle responsive-img " src="imagens/alof.png">
            </div>
            <div class="imagem">
              <img class="circle responsive-img " src="imagens/alcts.png">
            </div>
            </div>
            <div class="row justify-content-center">
              <h3 style="color: white;">Bem Vindo a</h3>
            </div>
            <div class="row justify-content-center">
              <h2 style="color: white;">Associação das Áreas de Lazer dos Militares da Aeronáutica de Campo Grande</h2>  
            </div>
            <div class="row justify-content-center">
                <a href="{{route('login')}}" class="btn-floating btn-large waves-effect waves-light blue accent-3 pulse"><i class="material-icons">screen_lock_landscape</i></a>
            </div>
            <div class="row justify-content-center">
              <small style="color: white;">Entrar</small>  
            </div>
              
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
