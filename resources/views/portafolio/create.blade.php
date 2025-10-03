@extends('layouts.dashboard')

@section('template_title')
    Crear Mi Portafolio
@endsection

@section('content')
<div class="container py-4">
    <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
        <div class="card-header bg-secondary text-white rounded-top-4">
            <h2 class="mb-0">Crear Mi Portafolio</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('mi-portafolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Datos básicos --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Nombre</label>
                    <input type="text" name="nombre" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('nombre') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Edad</label>
                    <input type="number" name="edad" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('edad') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="text" name="telefono" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('telefono') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Biografía</label>
                    <textarea name="biografia" class="form-control bg-dark text-light border-secondary" rows="3">{{ old('biografia') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('ubicacion') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Disponibilidad</label>
                    <input type="text" name="disponibilidad" class="form-control bg-dark text-light border-secondary"
                        value="{{ old('disponibilidad') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto de perfil</label>
                    <input type="file" name="foto_url" class="form-control bg-dark text-light border-secondary">
                </div>

                {{-- Habilidades --}}
                <div class="border-top border-secondary mt-4 pt-3">
                    <h4 class="text-info">Habilidades</h4>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Dicción y articulación</label>
                        <input type="text" name="diccion_articulacion" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('diccion_articulacion') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Actuación de emociones</label>
                        <input type="text" name="actuacion_emociones" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('actuacion_emociones') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Advertencia vocal</label>
                        <input type="text" name="advertencia_vocal" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('advertencia_vocal') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Home Studio</label>
                        <input type="text" name="home_studio" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('home_studio') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Edición/Postproducción</label>
                        <input type="text" name="edicion_postproduccion" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('edicion_postproduccion') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Entregas/Flujo de trabajo</label>
                        <input type="text" name="entregas_flujo_trabajo" class="form-control bg-dark text-light border-secondary"
                            value="{{ old('entregas_flujo_trabajo') }}">
                    </div>
                </div>

                {{-- Otros campos --}}
                <div class="border-top border-secondary mt-4 pt-3">
                    <h4 class="text-info">Otros</h4>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Créditos</label>
                        <textarea name="creditos" class="form-control bg-dark text-light border-secondary" rows="3">{{ old('creditos') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Formación</label>
                        <textarea name="formacion" class="form-control bg-dark text-light border-secondary" rows="3">{{ old('formacion') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Reconocimientos</label>
                        <textarea name="reconocimientos" class="form-control bg-dark text-light border-secondary" rows="3">{{ old('reconocimientos') }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-outline-info px-4">
                        <i class="fa fa-save"></i> Crear Portafolio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
