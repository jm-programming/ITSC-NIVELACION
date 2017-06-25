<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
                <meta content="IE=edge" http-equiv="X-UA-Compatible">
                    <meta content="width=device-width, initial-scale=1" name="viewport">
                        <title>
                            Nivelación - @yield('title')
                        </title>
                        <!-- Styles -->
                        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
                            <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
                                <!-- Bootstrap -->
                                <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
                                    <!-- Font Awesome -->
                                    <link href="{{ URL::asset('/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
                                        <!-- NProgress -->
                                        <link href="{{ URL::asset('/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
                                            <!-- iCheck -->
                                            <link href="{{ URL::asset('/vendors/iCheck/skins/flat/red.css') }}" rel="stylesheet">
                                                <!-- switch -->
                                                <link href="{{ URL::asset('/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
                                                    <!-- bootstrap-progressbar -->
                                                    <link href="{{ URL::asset('/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
                                                        <!-- JQVMap -->
                                                        <link href="{{ URL::asset('/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
                                                        <!-- bootstrap-daterangepicker -->
                                                        <link href="{{ URL::asset('/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
                                                            <!-- Custom Theme Style -->
                                                            <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
                                                            </link>
                                                        </link>
                                                    </link>
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a class="site_title" href="/home">
                                <img alt="" src="{{ URL::asset('img/itsc_logo.png')}}" width="51px">
                                    <span>
                                        Nivelación ITSC
                                    </span>
                                </img>
                            </a>
                        </div>
                        <div class="clearfix">
                        </div>
                        <?php
//obtener los caracteres que estan antes del @ y poner la primera letra en mayuscula
$email = Auth::user()->
	email;
$name = ucfirst(strtok($email, '@'));
?>
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_info">
                                <span>
                                </span>
                                <h2>
                                    <span>
                                        Bienvenido
                                    </span>
                                    {{ $name }}
                                </h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br/>
                        <!-- sidebar menu -->
                        <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
                            <div class="menu_section">
                                <h3>
                                    General
                                </h3>
                                <ul class="nav side-menu">
                                    <li>
                                        <a href="/home">
                                            <i class="fa fa-home">
                                            </i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-edit">
                                            </i>
                                            Estudiantes
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="/students">
                                                    Ver Estudiantes
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-desktop">
                                            </i>
                                            Docentes
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="general_elements.html">
                                                    Ver Docentes
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-table">
                                            </i>
                                            Secciones
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="/sections">
                                                    Ver Secciones
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-table">
                                            </i>
                                            Auditoria
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="tables.html">
                                                    Ver historico
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-bar-chart-o">
                                            </i>
                                            Citas
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="chartjs.html">
                                                    Examen de idiomas
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-table">
                                            </i>
                                            Empleados
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                {!!link_to('/employees', $title = 'Ver empleados', $secure = null)!!}
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-table">
                                            </i>
                                            Aulas
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                {!!link_to('classrooms', $title = 'Ver aulas', $secure = null)!!}
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fa fa-table">
                                            </i>
                                            Periodos Academicos
                                            <span class="fa fa-chevron-down">
                                            </span>
                                        </a>
                                        <ul class="nav child_menu">
                                            <li>
                                                {!!link_to('academic_periods', $title = 'Ver periodos academicos', $secure = null)!!}
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-placement="top" data-toggle="tooltip" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" title="Cerrar Sesión">
                                <span aria-hidden="true" class="glyphicon glyphicon-off">
                                </span>
                            </a>
                            <a data-placement="top" data-toggle="tooltip" title="Editar cuenta">
                                <span aria-hidden="true" class="glyphicon glyphicon-cog" href="#">
                                </span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle">
                                    <i class="fa fa-bars">
                                    </i>
                                </a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a aria-expanded="false" class="user-profile dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                                        {{ $name }}
                                        <span class=" fa fa-angle-down">
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Editar cuenta
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                                Cerrar sesión
                                                <i class="fa fa-sign-out pull-right">
                                                </i>
                                            </a>
                                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- /page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix">
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>
                                            @yield('title-content')
                                        </h2>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="x_content">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        ITSC - 2017
                    </div>
                    <div class="clearfix">
                    </div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{ URL::asset('/vendors/jquery/dist/jquery.min.js') }}">
        </script>
        <!-- Bootstrap -->
        <script src="{{ URL::asset('/vendors/bootstrap/dist/js/bootstrap.min.js') }}">
        </script>
        {{-- input mask --}}
        <script src="{{ URL::asset('/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}">
        </script>
        <!-- FastClick -->
        <script src="{{ URL::asset('/vendors/fastclick/lib/fastclick.js') }}">
        </script>
        <!-- switch -->
        <link href="{{ URL::asset('/vendors/switchery/dist/switchery.min.js') }}" rel="stylesheet">
            <!-- NProgress -->
            <script src="{{ URL::asset('/vendors/nprogress/nprogress.js') }}">
            </script>
            <!-- Chart.js -->
            <script src="{{ URL::asset('/vendors/Chart.js/dist/Chart.min.js') }}">
            </script>
            <!-- gauge.js -->
            <script src="{{ URL::asset('/vendors/gauge.js/dist/gauge.min.js') }}">
            </script>
            <!-- bootstrap-progressbar -->
            <script src="{{ URL::asset('/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
            </script>
            <!-- iCheck -->
            <script src="{{ URL::asset('/vendors/iCheck/icheck.min.js') }}">
            </script>
            <!-- Skycons -->
            <script src="{{ URL::asset('/vendors/skycons/skycons.js') }}">
            </script>
            <!-- Flot -->
            <script src="{{ URL::asset('/vendors/Flot/jquery.flot.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/Flot/jquery.flot.pie.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/Flot/jquery.flot.time.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/Flot/jquery.flot.stack.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/Flot/jquery.flot.resize.js') }}">
            </script>
            <!-- Flot plugins -->
            <script src="{{ URL::asset('/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/flot-spline/js/jquery.flot.spline.min.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/flot.curvedlines/curvedLines.js') }}">
            </script>
            <!-- DateJS -->
            <script src="{{ URL::asset('/vendors/DateJS/build/date.js') }}">
            </script>
            <!-- JQVMap -->
            <script src="{{ URL::asset('/vendors/jqvmap/dist/jquery.vmap.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}">
            </script>
            <!-- bootstrap-daterangepicker -->
            <script src="{{ URL::asset('/vendors/moment/min/moment.min.js') }}">
            </script>
            <script src="{{ URL::asset('/vendors/bootstrap-daterangepicker/daterangepicker.js') }}">
            </script>
            <!-- Custom Theme Scripts -->
            <script src="{{ URL::asset('js/custom.js') }}">
            </script>
            <script src="{{ URL::asset('js/app.js') }}">
            </script>
            @yield('script')
        </link>
    </body>
</html>