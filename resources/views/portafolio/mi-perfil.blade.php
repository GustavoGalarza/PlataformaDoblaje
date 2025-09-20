@extends('layouts.dashboard')

@section('template_title')
Mi Portafolio
@endsection

@section('content')
<div class="container py-5" style="background-color: #121212; min-height: 100vh;">
    <div class="card shadow-lg p-4" style="background-color: #1e1e1e; color: #f1f1f1; border-radius: 15px;">
        
        {{-- Botón superior de Editar --}}
        @if($perfil)
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('mi-portafolio.edit') }}" class="btn btn-warning">
    <i class="fa fa-edit"></i> Editar Perfil
</a>

            </div>
        @endif

        <div class="row">
            {{-- Columna izquierda: Foto y datos básicos --}}
            <div class="col-md-4 text-center mb-4">
                @if($perfil && $perfil->foto_url)
                    <x-cloudinary::image 
                        public-id="{{ $perfil->foto_url }}" 
                        width="200" height="200" crop="fill" 
                        class="rounded-circle shadow mb-3" 
                        style="object-fit: cover; border: 5px solid #333;" />
                @else
                    <i class="fa-solid fa-user fa-10x mb-3 text-secondary" style="border: 5px solid #333; border-radius: 50%; padding: 20px;"></i>
                @endif

                <h2 class="fw-bold">{{ $perfil ? $perfil->nombre : 'Mi Perfil' }}</h2>
                <p class="text-muted">{{ $perfil?->email }}</p>
                <p><i class="fa fa-phone"></i> {{ $perfil?->telefono }}</p>
                <p><i class="fa fa-map-marker-alt"></i> {{ $perfil?->ubicacion }}</p>
            </div>

            {{-- Columna derecha: Información detallada --}}
            <div class="col-md-8">
                @if($perfil)
                    <div class="mb-4">
                        <h4 class="border-bottom ">Biografía</h4>
                        <p>{{ $perfil->biografia }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="border-bottom ">Disponibilidad</h4>
                        <p>{{ $perfil->disponibilidad }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="border-bottom ">Habilidades</h4>
                        <ul class="list-unstyled">
                            <li><strong>Dicción y articulación:</strong> {{ $perfil->diccion_articulacion }}</li>
                            <li><strong>Actuación de emociones:</strong> {{ $perfil->actuacion_emociones }}</li>
                            <li><strong>Advertencia vocal:</strong> {{ $perfil->advertencia_vocal }}</li>
                            <li><strong>Home Studio:</strong> {{ $perfil->home_studio }}</li>
                            <li><strong>Edición/Postproducción:</strong> {{ $perfil->edicion_postproduccion }}</li>
                            <li><strong>Entregas/Flujo de trabajo:</strong> {{ $perfil->entregas_flujo_trabajo }}</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h4 class="border-bottom pb-2">Créditos</h4>
                        <p>{{ $perfil->creditos }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="border-bottom pb-2">Formación</h4>
                        <p>{{ $perfil->formacion }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="border-bottom pb-2">Reconocimientos</h4>
                        <p>{{ $perfil->reconocimientos }}</p>
                    </div>
                @else
                    <p>No tienes perfil creado. Usa el botón del modal para crearlo.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
