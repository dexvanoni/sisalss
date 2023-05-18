<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SiGAL') }}</title>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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
        .scrolling-wrapper-flexbox {
          display: flex;
          flex-wrap: nowrap;
          overflow-x: auto;

          .card {
            flex: 0 0 auto;
          }
        }
      </style>
</head>
<body>
            <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="{{ route('sair') }}">Sair</a></li>
        </ul>
      <nav> 
        <div class="nav-wrapper  blue darken-4">
      <a href="#" class="brand-logo">SiGAL - Sistema de Gerenciamento de Área de Lazer</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if(Auth::check())
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">@if(is_null(Auth::user()->nguerra)) Sr(a). {{Auth::user()->name}} @else {{Auth::user()->posto}} {{Auth::user()->nguerra}} @endif<i class="material-icons right">arrow_drop_down</i></a></li>
        @endif
      </ul>
    </div>
      </nav>
@if(Auth::check())
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="imagens/back.png">
      </div>
      <a href="#user"><img class="circle" src="imagens/soldado.jpg"></a>

      <a href="#name"><span class="white-text name">@if(is_null(Auth::user()->nguerra)) {{Auth::user()->name}} @else {{Auth::user()->posto}} {{Auth::user()->nguerra}} @endif</span></a>
      <a href="#email"><span class="white-text email"> @if(is_null(Auth::user()->funcao)) {{Auth::user()->categoria}} - {{Auth::user()->area}} @else {{Auth::user()->funcao}} - {{Auth::user()->area}}@endif</span></a>
    </div></li>
    @if (Auth::user()->perfil < 2)
    <li><a href="#!"><i class="material-icons">person</i>Usuários</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Reservas</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Diretorias</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Espaços</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Materiais</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Esportes e Serviços</a></li>
    <li><a href="#!"><i class="material-icons">person</i>Piscina</a></li>
    @else
    <li><a href="#!"><i class="material-icons">person</i>Reservas</a></li>
    @endif
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  @endif
    <div class="container-fluid">
        @yield('content')
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"  defer></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
  });
</script>
</body>
</html>
