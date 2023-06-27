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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    .datalist-options {
      display: none;
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
      <a href="#" class="brand-logo">SiGAL</a>
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

    <li><a href="#!" class="dropdown-trigger" data-target='drop_usuarios'><i class="fa-solid fa-users" style="color: #000000;"></i>Usuários</a></li>
    <ul id='drop_usuarios' class='dropdown-content' style="background-color: #eeeeee;">
      <li><a href="#!"><i class="fa-solid fa-people-group"></i>Lista</a></li>
      <li><a href="{{route('register')}}"><i class="fa-solid fa-user-plus"></i>Novo</a></li>
    </ul>

    <li><a href="#!" class="dropdown-trigger" data-target='drop_reservas'><i class="fa-solid fa-champagne-glasses" style="color: #000000;"></i>Reservas</a></li>
    <ul id='drop_reservas' class='dropdown-content' style="background-color: #eeeeee;">
      <li><a href="#!"><i class="fa-solid fa-list-check"></i>Abertas</a></li>
      <li><a href="#!"><i class="fa-solid fa-file-circle-plus"></i>Nova</a></li>
    </ul>

    <!--<li><a href="#!" class="dropdown-trigger" data-target='drop_diretorias'><i class="fa-solid fa-people-line" style="color: #000000;"></i>Diretorias</a></li>
    <ul id='drop_diretorias' class='dropdown-content' style="background-color: #eeeeee;">
      <li><a href="#!"><i class="fa-solid fa-ranking-star"></i>Esporte</a></li>
      <li><a href="#!"><i class="fa-regular fa-newspaper"></i>Administrativo</a></li>
      <li><a href="#!"><i class="fa-solid fa-person-booth"></i>Eventos</a></li>
      <li><a href="#!"><i class="fa-solid fa-cash-register"></i>Financeiro</a></li>
      <li><a href="#!"><i class="fa-solid fa-user-shield"></i>Jurídico</a></li>
      <li><a href="#!"><i class="fa-solid fa-trowel-bricks"></i>Infraestrutura</a></li>
      <li><a href="#!"><i class="fa-solid fa-school-lock"></i>Patrimônio</a></li>
      <li><a href="#!"><i class="fa-solid fa-icons"></i>Pub/Propaganda</a></li>
    </ul>
  -->
  <li><a href="#!"><i class="fa-solid fa-house-flag" style="color: #000000;"></i>Espaços</a></li>
  <li><a href="#!" class="dropdown-trigger" data-target='drop_materiais'><i class="fa-solid fa-boxes-stacked" style="color: #000000;"></i>Materiais</a></li>
  <ul id='drop_materiais' class='dropdown-content' style="background-color: #eeeeee;">
    <li><a href="#!"><i class="fa-solid fa-clipboard-list"></i>Lista</a></li>
    <li><a href="#!"><i class="fa-solid fa-cart-arrow-down"></i>Cautelas</a></li>
  </ul>
  <li><a href="#!"><i class="fa-solid fa-volleyball" style="color: #000000;"></i>Esportes e Serviços</a></li>
  <li><a href="#!"><i class="fa-solid fa-person-swimming" style="color: #000000;"></i>Piscina</a></li>




  @else
  <li><a href="#!"><i class="fa-solid fa-champagne-glasses" style="color: #000000;"></i>Reservas</a></li>
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
    $('select').formSelect();
      //$('.datepicker').datepicker();
    $(".dropdown-trigger").dropdown({
      alignment: 'right',
    });

    $('.toggle-password').click(function() {
      var input = $(this).prev('input');
      var icon = $(this);

      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.text('visibility_off');
      } else {
        input.attr('type', 'password');
        icon.text('visibility');
      }
    });
    $('#dep').hide();
  });
</script>

<script>
document.getElementById('foto').addEventListener('change', function() {
    var fileInput = this;
    var errorMessage = document.getElementById('error-msg');
    var maxSizeInBytes = 2097152; // 2MB

    if (fileInput.files.length > 0) {
        var fileSize = fileInput.files[0].size;

        if (fileSize > maxSizeInBytes) {
            errorMessage.textContent = 'Tamanho máximo excedido. Por favor, escolha uma imagem menor. (2MB)';
            fileInput.value = ''; // Limpa o campo de arquivo selecionado
        } else {
            errorMessage.textContent = '';
        }
    }
});
</script>
</body>
</html>
