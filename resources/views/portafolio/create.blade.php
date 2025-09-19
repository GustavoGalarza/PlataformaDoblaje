@extends('layouts.dashboard')

@section('template_title')
Crear Mi Portafolio
@endsection

@section('content')
<div class="container py-4">
    <h2>Crear Mi Portafolio</h2>
    <form action="{{ route('mi-portafolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>
        <div class="mb-3">
            <label>Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ old('edad') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>
        <div class="mb-3">
            <label>Biografía</label>
            <textarea name="biografia" class="form-control">{{ old('biografia') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}">
        </div>
        <div class="mb-3">
            <label>Disponibilidad</label>
            <input type="text" name="disponibilidad" class="form-control" value="{{ old('disponibilidad') }}">
        </div>
        <div class="mb-3">
            <label>Foto de perfil</label>
            <input type="file" name="foto_url" class="form-control">
        </div>

        {{-- Habilidades --}}
        <div class="mb-3">
            <label>Dicción y articulación</label>
            <input type="text" name="diccion_articulacion" class="form-control" value="{{ old('diccion_articulacion') }}">
        </div>
        <div class="mb-3">
            <label>Actuación de emociones</label>
            <input type="text" name="actuacion_emociones" class="form-control" value="{{ old('actuacion_emociones') }}">
        </div>
        <div class="mb-3">
            <label>Advertencia vocal</label>
            <input type="text" name="advertencia_vocal" class="form-control" value="{{ old('advertencia_vocal') }}">
        </div>
        <div class="mb-3">
            <label>Home Studio</label>
            <input type="text" name="home_studio" class="form-control" value="{{ old('home_studio') }}">
        </div>
        <div class="mb-3">
            <label>Edición/Postproducción</label>
            <input type="text" name="edicion_postproduccion" class="form-control" value="{{ old('edicion_postproduccion') }}">
        </div>
        <div class="mb-3">
            <label>Entregas/Flujo de trabajo</label>
            <input type="text" name="entregas_flujo_trabajo" class="form-control" value="{{ old('entregas_flujo_trabajo') }}">
        </div>

        <div class="mb-3">
            <label>Créditos</label>
            <textarea name="creditos" class="form-control">{{ old('creditos') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Formación</label>
            <textarea name="formacion" class="form-control">{{ old('formacion') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Reconocimientos</label>
            <textarea name="reconocimientos" class="form-control">{{ old('reconocimientos') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Portafolio</button>
    </form>
</div>
@endsection
