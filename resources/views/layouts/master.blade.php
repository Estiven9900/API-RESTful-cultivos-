<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/icon.png')}}" type="images/x-">
    <title>Bienvenido Agrosoft</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE-3.2.0/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav class="main-header navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <!-- Botón para abrir menú lateral -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Contenido del Navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
              
                
    
                    <!-- Perfil de Usuario -->
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <aside class="main-sidebar sidebar-success-green elevation-4">
       <center> <img src="{{ asset('images/LogoAgrosoft2.png')}}" width="40%" alt=""></center>
        <div class="sidebar">
            <!-- Sidebar Menu -->

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <br><br><br><br>

                    <!-- Unidades Productivas -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link text-success">
                            <i class="fas fa-seedling"></i> &nbsp;
                            <p>
                                Unidades Agricolas
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cultivos.create') }}" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>Ingreso</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link text-dark">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>Listas</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/demo.js') }}"></script>
</body>

</html>