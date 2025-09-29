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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Cloudinary Video Player CSS -->
    <link href="https://unpkg.com/cloudinary-video-player@1.9.12/dist/cld-video-player.min.css" rel="stylesheet">

    <!-- Cloudinary Core + Video Player JS -->
    <script src="https://unpkg.com/cloudinary-core@2.12.3/cloudinary-core-shrinkwrap.min.js"></script>
    <script src="https://unpkg.com/cloudinary-video-player@1.9.12/dist/cld-video-player.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }

        /* Sidebar */
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

        .sidebar:hover {
            width: 220px;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #ffc107;
            padding-left: .3rem;
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
            background-color: #111;
            padding: 5px;
        }
    </style>
</head>

<body>
    @php
        use Illuminate\Support\Facades\Auth;
        $perfil = Auth::check() ? \App\Models\Perfile::where('user_id', Auth::id())->first() : null;
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-clapperboard"></i>
                <span class="brand-text ms-2">{{ config('app.name', 'Doblaje') }}</span>
            </div>
        </div>

        @auth
            <!-- Mi Perfil -->
            <a href="{{ $perfil ? route('mi-portafolio') : 'javascript:void(0);' }}" id="link-perfil"
                class="d-flex align-items-center text-decoration-none">
                @if ($perfil && $perfil->foto_url)
                    <div class="d-flex align-items-center">
                        <div style="width:32px;height:32px;min-width:32px;overflow:hidden;border-radius:50%;flex-shrink:0;">
                            <x-cloudinary::image public-id="{{ $perfil->foto_url }}" width="32" height="32"
                                crop="fill" style="width:100%;height:100%;object-fit:cover;" />
                        </div>
                        <span class="ms-2">{{ $perfil->nombre }}</span>
                    </div>
                @else
                    <i class="fa-solid fa-user me-2" style="font-size: 1.5rem;"></i>
                    <span>{{ $perfil ? $perfil->nombre : 'Mi Perfil' }}</span>
                @endif
            </a>
        @endauth

        <!-- Otras opciones -->
        <a href="{{ route('perfiles.index') }}" class="nav-link">
            <i class="fa fa-table"></i>
            <span>Perfiles/Control</span>
        </a>
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
        <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">
            <i class="fa-solid fa-users-gear"></i>
            <span>Usuarios</span>
        </a>
        <a href="{{ route('redes-sociales.index') }}" class="{{ request()->is('redes-sociales*') ? 'active' : '' }}">
            <i class="fa-solid fa-network-wired"></i>
            <span>Control/Redes Sociales</span>
        </a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Cerrar Sesión</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>

    <!-- Modal si no hay perfil -->
    @auth
        @if (!$perfil)
            <div class="modal fade" id="no-perfil-modal" tabindex="-1" aria-labelledby="noPerfilLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Perfil no encontrado</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            La cuenta <strong>{{ Auth::user()->email }}</strong> no tiene un perfil creado.
                            ¿Deseas crear uno ahora?
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('mi-portafolio.create') }}" class="btn btn-primary">Crear Perfil</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth

    <!-- Content -->
    <div class="content">
        @yield('content')
        @include('layouts.alerts')
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @auth
        @if (!$perfil)
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let linkPerfil = document.getElementById("link-perfil");
                    if (linkPerfil) {
                        linkPerfil.addEventListener("click", function(e) {
                            e.preventDefault();
                            var myModal = new bootstrap.Modal(document.getElementById('no-perfil-modal'));
                            myModal.show();
                        });
                    }
                });
            </script>
        @endif
    @endauth

    @stack('scripts')
    <!-- Bootstrap JS (con Popper incluido) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
