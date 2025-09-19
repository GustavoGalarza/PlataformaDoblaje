@extends('layouts.dashboard')

@section('template_title')
Mi Portafolio
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4 text-center">
            @if($perfil && $perfil->foto_url)
                <x-cloudinary::image public-id="{{ $perfil->foto_url }}" width="150" height="150" crop="fill" class="rounded-circle mb-3"/>
            @else
                <i class="fa-solid fa-user fa-7x mb-3"></i>
            @endif

            <h3>{{ $perfil ? $perfil->nombre : 'Mi Perfil' }}</h3>
            <p>{{ $perfil?->email }}</p>
            <p>{{ $perfil?->telefono }}</p>
            <p>{{ $perfil?->ubicacion }}</p>
        </div>

        <div class="col-md-8">
            @if($perfil)
                <h4>Biografía</h4>
                <p>{{ $perfil->biografia }}</p>

                <h4>Disponibilidad</h4>
                <p>{{ $perfil->disponibilidad }}</p>

                <h4>Habilidades</h4>
                <ul>
                    <li><strong>Dicción y articulación:</strong> {{ $perfil->diccion_articulacion }}</li>
                    <li><strong>Actuación de emociones:</strong> {{ $perfil->actuacion_emociones }}</li>
                    <li><strong>Advertencia vocal:</strong> {{ $perfil->advertencia_vocal }}</li>
                    <li><strong>Home Studio:</strong> {{ $perfil->home_studio }}</li>
                    <li><strong>Edición/Postproducción:</strong> {{ $perfil->edicion_postproduccion }}</li>
                    <li><strong>Entregas/Flujo de trabajo:</strong> {{ $perfil->entregas_flujo_trabajo }}</li>
                </ul>

                <h4>Créditos</h4>
                <p>{{ $perfil->creditos }}</p>

                <h4>Formación</h4>
                <p>{{ $perfil->formacion }}</p>

                <h4>Reconocimientos</h4>
                <p>{{ $perfil->reconocimientos }}</p>
            @else
                <p>No tienes perfil creado. Usa el botón del modal para crearlo.</p>
            @endif
        </div>
    </div>
</div>
@endsection
