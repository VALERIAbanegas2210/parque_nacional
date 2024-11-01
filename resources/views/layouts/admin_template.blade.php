<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @section('header2')
        <title>Dashboard - Parque Nacional</title>
    @endsection
    @yield('header2')
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/usuariotemplate/administracion/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/usuariotemplate/administracion/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">ss
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/boxicons/css/boxicons.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/usuariotemplate/administracion/assets/vendor/simple-datatables/style.css') }}"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/usuariotemplate/administracion/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Apr 20 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('/usuariotemplate/administracion/assets/img/favicon.png') }}" alt="">
                <span class="d-none d-lg-block">Parque Nacional Amboro</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->



                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ Auth::guard('usuarios')->user()->profile_image
                            ? asset('storage/' . Auth::guard('usuarios')->user()->profile_image)
                            : (Auth::guard('usuarios')->user()->sexo == 'masculino'
                                ? asset('/usuariotemplate/administracion/assets/img/default-masculino.jpg')
                                : asset('/usuariotemplate/administracion/assets/img/default-femenino.jpg')) }}"
                            alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            @if (Auth::guard('usuarios')->check())
                                {{ Auth::guard('usuarios')->user()->nombre }}
                            @else
                                Invitado
                            @endif
                        </span>

                    </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            @if (Auth::guard('usuarios')->check())
                                <h6>{{ Auth::guard('usuarios')->user()->nombre }}</h6>
                                <span>{{ Auth::guard('usuarios')->user()->correo }}</span>
                                <!-- Aquí mostramos el rol del usuario -->
                                <br>
                                <div>
                                    <strong>Roles:</strong>
                                    @foreach (Auth::guard('usuarios')->user()->roles as $role)
                                        <span>{{ $role->name }}</span>{{ $loop->last ? '' : ',' }}
                                        <!-- Muestra los roles separados por comas -->
                                    @endforeach
                                </div>
                            @else
                                <h6>Invitado</h6>
                                <span></span>
                            @endif
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item d-flex align-items-center" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>


                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->



            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('layouts.admin_template') ? '' : 'collapsed' }}"
                    href="{{ route('layouts.admin_template') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

    

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : '' }} collapsed"
                    data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="{{ request()->routeIs('usuarios.index') ? 'true' : 'false' }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Registro</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ request()->routeIs('usuarios.index') ? 'active' : '' }}"
                            href="{{ route('usuarios.index') }}">
                            <i class="bi bi-circle"></i>
                            <span>Usuario</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i>
                            <span>Guarda Parque</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i>
                            <span>Administrador</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            
           

<!-- Paquete 1 -->
<li class="nav-item">
    <a class="nav-link" data-bs-target="#tables-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Paquete 1:Gestionar Usuario</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav1" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="/comunidad/show_villa_amoboro/5">
                <i class="bi bi-circle"></i>
                <span>Caso 1:Inicio Sesion</span>
            </a>
        </li>

        
        <li>
            <a href="/comunidad/show_jardin_de_las_delicias/7">
                <i class="bi bi-circle"></i>
                <span>Caso 2:Cierre Sesion</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 3:Perfil de Usuario</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_mataracu/1">
                <i class="bi bi-circle"></i>
                <span>Caso 4:Asignar Permisos</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.Roles.index') ? '' : 'collapsed' }}"
            href="{{ route('admin.Roles.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 5:Gestionar Roles</span>
            </a>
        </li>

        <li>
            <a class="{{ request()->routeIs('usuarios.index') ? 'active' : '' }}"
                    href="{{ route('usuarios.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 6:Registrar Usuario</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.index') ? '' : 'collapsed' }}"
                 href="{{ route('admin.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 7:Gestionar contraseña</span>
            </a>
        </li>
    </ul>
</li>

<!-- Paquete 2 -->
<li class="nav-item">
    <a class="nav-link" data-bs-target="#tables-nav2" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Paquete 2:Gestionar Ventas</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="/comunidad/show_example1/10">
                <i class="bi bi-circle"></i>
                <span>Caso 8:Adminstrar estado de la compra</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_example2/11">
                <i class="bi bi-circle"></i>
                <span>Caso 9:Generar Entrada</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_example3/12">
                <i class="bi bi-circle"></i>
                <span>Caso 10:Realizar Tipo de pago</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.tipo_entrada.index') ? '' : 'collapsed' }}"
                  href="{{ route('admin.tipo_entrada.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 11:Gestionar Tipo de entrada</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_example5/14">
                <i class="bi bi-circle"></i>
                <span>Caso 12:Gestionar Reservas de Entradas</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_example5/14">
                <i class="bi bi-circle"></i>
                <span>Caso 13:Generar Reportes</span>
            </a>
        </li>
        <li>
            <a href="/comunidad/show_example5/14">
                <i class="bi bi-circle"></i>
                <span>Caso 17:Gestionar Formulario de la venta de entrada</span>
            </a>
        </li>
    </ul>
</li>


<!-- Paquete 3 -->
<li class="nav-item">
    <a class="nav-link" data-bs-target="#tables-nav3" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Paquete 3:Gestionar informacion de Comunidades</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav3" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="/comunidad/show_villa_amoboro/5">
                <i class="bi bi-circle"></i>
                <span>Caso 18:Gestionar Experiencia de Cliente</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.rutas.index') ? '' : 'collapsed' }}"
            href="{{ route('admin.rutas.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 19:Planificar rutas de visitas</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.comunidades.index') ? '' : 'collapsed' }}"
                 href="{{ route('admin.comunidades.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 20:Descripcion de atractivos de comunidades</span>
            </a>
        </li>
        
    </ul>
</li>

<!-- Paquete 4 -->
<li class="nav-item">
    <a class="nav-link" data-bs-target="#tables-nav4" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Paquete 4:Gestionar Guardaparque</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav4" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a class="nav-link {{ request()->routeIs('admin.guardaparque.index') ? '' : 'collapsed' }}"
                 href="{{ route('admin.guardaparque.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 14:Gestionar Guardaparque</span>
            </a>
        </li>

        <li>
            <a class="nav-link {{ request()->routeIs('admin.guardaparque.index') ? '' : 'collapsed' }}"
                 href="{{ route('admin.guardaparque.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 15:Gestionar horario de Guardaparque</span>
            </a>
        </li>

        <li>
            <a  class="nav-link {{ request()->routeIs('bitacora.index') ? '' : 'collapsed' }}"
            href="{{ route('bitacora.index') }}">
                <i class="bi bi-circle"></i>
                <span>Caso 16:Gestionar Bitacora</span>
            </a>
        </li>
        
        <li>
            <a class="nav-link {{ request()->routeIs('admin.guardaparque.index') ? '' : 'collapsed' }}"
            href="{{ route('admin.guardaparque.index') }}">
             </i class="bi bi-circle"></i>
                <span>Caso 21:Gestionar Bitacora de Guardaparque</span>
            </a>
        </li>
       
    </ul>
</li>


           

 </ul>
    </aside><!-- End Sidebar -->



    <main id="main" class="main">

        <div class="pagetitle">
            @yield('header')
            <!-- <h1>Dashboard</h1>
                                                                    <nav>
                                                                        <ol class="breadcrumb">
                                                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                                            <li class="breadcrumb-item active">Dashboard</li>
                                                                        </ol>
                                                                    </nav> -->
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                @yield('content')




            </div>
        </section>

    </main>
    <script>
        window.history.pushState(null, document.title, window.location.href);
        window.addEventListener('popstate', function(event) {
            window.history.pushState(null, document.title, window.location.href);
            // Aquí puedes agregar un mensaje o redirigir
            // alert("No puedes volver a la página anterior.");
            window.location.href = "{{ route('layouts.admin_template') }}"; // Redirigir si se intenta volver
        });
    </script>
    @section('footer')
        <a href="{{ route('layouts.admin_template') }}"
            class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @endsection
    @yield('footer')


    <!-- Vendor JS Files -->
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('usuariotemplate/administracion/assets/vendor/simple-datatables/simple-datatables.js') }}">
    </script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/usuariotemplate/administracion/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/usuariotemplate/administracion/assets/js/main.js') }}"></script>

</body>



</html>
