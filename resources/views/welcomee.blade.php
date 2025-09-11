{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
@php
use Illuminate\Support\Facades\Route;
@endphp

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto de Doblaje 🎙️</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                🎬 Proyecto de Doblaje
            </a>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-light me-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenido a mi Proyecto de Doblaje 🎙️</h1>
            <p class="lead">Un espacio dedicado a dar voz a personajes e historias.</p>
            <a href="#about" class="btn btn-light btn-lg mt-3">Conocer más</a>
        </div>
    </header>

    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">¿De qué trata este proyecto?</h2>
            <p class="text-muted">
                Este sitio web es una vitrina de mi trabajo en doblaje. Aquí podrás encontrar demos, proyectos,
                colaboraciones y un vistazo al arte de dar vida a personajes mediante la voz.
            </p>
        </div>
    </section>

    <section id="features" class="bg-light py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <h3>🎧 Demos</h3>
                    <p>Escucha mis muestras de voz en diferentes estilos y personajes.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>🎬 Proyectos</h3>
                    <p>Conoce los trabajos y colaboraciones en los que he participado.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>📩 Contacto</h3>
                    <p>¿Quieres colaborar? Encuentra mis datos de contacto fácilmente.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <small>&copy; {{ date('Y') }} Proyecto de Doblaje. Todos los derechos reservados.</small>
        </div>
    </footer>
</body>
</html>
