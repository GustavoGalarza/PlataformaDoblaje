<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proyecto de Doblaje') }} - Dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

    <!-- Font Awesome (íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }

        /* Sidebar base */
        .sidebar {
            width: 70px;
            background: #212529;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 1rem .5rem;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        /* Sidebar expandido */
        .sidebar:hover {
            width: 220px;
        }

        /* Brand (logo + texto) */
        .sidebar .brand {
            display: flex;
            align-items: center;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #ffc107;
            padding-left: .3rem;
            /* 👈 mantiene fijo el icono */
        }

        .sidebar .brand i {
            font-size: 1.6rem;
            min-width: 30px;
            text-align: center;
        }

        .sidebar .brand-text {
            opacity: 0;
            white-space: nowrap;
            margin-left: .6rem;
            transform: translateX(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .sidebar:hover .brand-text {
            opacity: 1;
            transform: translateX(0);
        }

        /* Links */
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: .7rem .8rem;
            display: flex;
            align-items: center;
            border-radius: .3rem;
            margin-bottom: .5rem;
            white-space: nowrap;
            transition: all .2s;
        }

        .sidebar a i {
            font-size: 1.2rem;
            margin-right: 1rem;
            min-width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar a span {
            opacity: 0;
            transform: translateX(-10px);
            transition: opacity 0.2s ease, transform 0.3s ease;
        }

        .sidebar:hover a span {
            opacity: 1;
            transform: translateX(0);
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #495057;
            color: #fff;
        }

        /* Contenido */
        .content {
            flex: 1;
            background: #f8f9fa;
            padding: 2rem;
        }
    </style>



</head>

<body>
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <i class="fa-solid fa-clapperboard"></i>
            <span class="brand-text">{{ config('app.name', 'Doblaje') }}</span>
        </div>

        <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Perfil</span>
        </a>
        <!-- Noticias -->
        <a href="{{ route('noticias.index') }}" class="nav-link">
            <i class="fa fa-table-list"></i>
            <span>Noticias/Control</span>
        </a>
        <a href="{{ route('panel-noticias') }}" class="nav-link">
            <i class="fa fa-newspaper"></i>
            <span>Noticias</span>
        </a>
        <a href="{{ route('panel-habilidades') }}" class="nav-link">
            <i class="fa fa-hands"></i>
            <span>Control/Habilidades</span>
        </a>
        <!-- Usuarios -->
        <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">
            <i class="fa-solid fa-users-gear"></i>
            <span>Usuarios</span>
        </a>

        <!-- Auxiliares -->


        <a href="{{ route('redes-sociales.index') }}" class="{{ request()->is('redes-sociales*') ? 'active' : '' }}">
            <i class="fa-solid fa-network-wired"></i>
            <span>Control/Redes Sociales</span>
        </a>

        <!-- Logout -->
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Cerrar Sesión</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>


    <!-- Content -->
    <div class="content">
        @yield('content')
        @include('layouts.alerts') {{-- Aquí incluimos los alerts --}}
    </div>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

</body>

</html>
