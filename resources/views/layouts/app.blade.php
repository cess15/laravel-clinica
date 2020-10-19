<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Clinica | Cuida la vida</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js')}}"></script>
  <script src="{{ asset('dist/js/adminlte.js')}}"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div id="app">
    <div class="wrapper">

      <!-- Navbar -->
      @yield('navbar')

      <!-- 
      SEARCH FORM 
      <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search"
                  aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
      -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
          <img src="{{asset('dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
          <span class="brand-text font-weight-light">Cuida la vida</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">
                @guest
                <a class="nav-link bg-success" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                @else
                {{ Auth::user()->name }}
                <a class="dropdown-item bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                  Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

                @endguest
              </a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item">
                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Inicio</p>
                </a>
              </li>

              <!-- Usuarios -->
              <li class="nav-item">
                <a href="{{url('usuarios')}}"
                  class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                    <?php use App\User; $users_count = User::all()->count(); ?>
                    <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                  </p>
                </a>
              </li>

              <!-- Medicos -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user-md"></i>
                  <p>
                    Médicos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('medicos/create')}}" class="nav-link active">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Registrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('medicos')}}" class="nav-link active">
                      <i class="fas fa-id-card-alt nav-icon"></i>
                      <p>Todos los registros</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Pacientes -->

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user-injured"></i>
                  <p>
                    Pacientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Registrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-id-card-alt nav-icon"></i>
                      <p>Todos los registros</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Habitaciones -->

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-person-booth"></i>
                  <p>
                    Habitaciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Registrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-id-card-alt nav-icon"></i>
                      <p>Todos los registros</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Internaciones -->

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-procedures"></i>
                  <p>
                    Internaciones
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Internar Paciente</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-id-card-alt nav-icon"></i>
                      <p>Todos los registros</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Altas -->

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-procedures"></i>
                  <p>
                    Dar de Alta
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Internar Paciente</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="fas fa-id-card-alt nav-icon"></i>
                      <p>Todos los registros</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.slidebar-menu -->
      </aside>
      <!-- /.sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            @yield('content-header')
          </div>
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content mt-3">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Desarrollado by <a href="https://github.com/cess15"> César Lata </a>
        </div>
        <!-- Default to the left -->
      <strong>Copyright &copy; 2020-{{ date('Y')+1 }}<a href="https://adminlte.io"> Cuida tu vida</a>.</strong> All rights
        reserved.
      </footer>
    </div>
    <!-- ./wrapper -->
  </div>
</body>

</html>