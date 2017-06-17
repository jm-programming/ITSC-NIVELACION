  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nivelación - @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>

<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
        
   <div class="navbar-header">   
      <a class="navbar-brand" href="/landingPage">
        <img alt="Brand" src="{{ asset('img/logo.png') }}" class="pointer">
      </a>
   </div>
     <ul class="nav navbar-nav">
      <li id="botonAbrir" class=""><i class="fa fa-bars fa-3x posicionBotonAbrir pointer blackColor" aria-hidden="true"></i></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php 
            //obtener los caracteres que estan antes del @ y poner la primera letra en mayuscula
            $email = Auth::user()->email; 
            $name = ucfirst(strtok($email, '@'));
          ?>
          <li class="dropdown"><a class="dropdown-toggle enlaces pointer" data-toggle="dropdown" href="#"> {{ $name }} <span class="caret"></span></a>
            <ul class="dropdown-menu dropDownFix">
              <li><a href="#">Editar</a></li>
              <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Cerrar sesion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
    </div>
</nav>
  
    <div id="miMenuDerecho" class="menuDerecho">
    <a href="#" id="botonCerrar" class="closebtn">&times;</a>
    <a href="/student">Estudiantes</a>
    <a href="">Profesores</a>
    <a href="">Historico</a>
    <a href="">Cita de examen de idiomas</a>
    </div>

    <!--for the content-->
      @yield('content')  
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/navegacion.js') }}"></script>
    <script src="{{ asset('vendors/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    @yield('script')
</html>