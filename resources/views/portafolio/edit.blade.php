@extends('layouts.dashboard')

@section('template_title')
Editar Mi Portafolio
@endsection

@section('content')
<div class="container py-5" style="background-color: #121212; min-height: 100vh;">
    <div class="card shadow-lg p-4" style="background-color: #1e1e1e; color: #f1f1f1; border-radius: 15px;">

        <h2 class="mb-4 text-center">Editar Mi Portafolio</h2>

        <form action="{{ route('mi-portafolio.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Columna izquierda --}}
                <div class="col-md-4 text-center mb-4">
                    @if($perfil->foto_url)
                        <x-cloudinary::image 
                            public-id="{{ $perfil->foto_url }}" 
                            width="180" height="180" crop="fill" 
                            class="rounded-circle shadow mb-3" 
                            style="object-fit: cover; border: 5px solid #333;" />
                    @else
                        <i class="fa-solid fa-user fa-8x mb-3 text-secondary" style="border: 5px solid #333; border-radius: 50%; padding: 15px;"></i>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Cambiar Foto de Perfil</label>
                        <input type="file" name="foto_url" class="form-control bg-dark text-light">
                    </div>
                </div>

                {{-- Columna derecha --}}
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control bg-dark text-light" value="{{ old('nombre', $perfil->nombre) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" name="edad" class="form-control bg-dark text-light" value="{{ old('edad', $perfil->edad) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control bg-dark text-light" value="{{ old('email', $perfil->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control bg-dark text-light" value="{{ old('telefono', $perfil->telefono) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control bg-dark text-light" value="{{ old('ubicacion', $perfil->ubicacion) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biografía</label>
                        <textarea name="biografia" rows="4" class="form-control bg-dark text-light">{{ old('biografia', $perfil->biografia) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Disponibilidad</label>
                        <input type="text" name="disponibilidad" class="form-control bg-dark text-light" value="{{ old('disponibilidad', $perfil->disponibilidad) }}">
                    </div>

                    <hr class="border-light">

                    <h5>Habilidades</h5>

                    <div class="mb-3">
                        <label class="form-label">Dicción y articulación</label>
                        <input type="text" name="diccion_articulacion" class="form-control bg-dark text-light" value="{{ old('diccion_articulacion', $perfil->diccion_articulacion) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Actuación de emociones</label>
                        <input type="text" name="actuacion_emociones" class="form-control bg-dark text-light" value="{{ old('actuacion_emociones', $perfil->actuacion_emociones) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Advertencia vocal</label>
                        <input type="text" name="advertencia_vocal" class="form-control bg-dark text-light" value="{{ old('advertencia_vocal', $perfil->advertencia_vocal) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Home Studio</label>
                        <input type="text" name="home_studio" class="form-control bg-dark text-light" value="{{ old('home_studio', $perfil->home_studio) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Edición/Postproducción</label>
                        <input type="text" name="edicion_postproduccion" class="form-control bg-dark text-light" value="{{ old('edicion_postproduccion', $perfil->edicion_postproduccion) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Entregas/Flujo de trabajo</label>
                        <input type="text" name="entregas_flujo_trabajo" class="form-control bg-dark text-light" value="{{ old('entregas_flujo_trabajo', $perfil->entregas_flujo_trabajo) }}">
                    </div>

                    <hr class="border-light">

                    <div class="mb-3">
                        <label class="form-label">Créditos</label>
                        <textarea name="creditos" rows="2" class="form-control bg-dark text-light">{{ old('creditos', $perfil->creditos) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Formación</label>
                        <textarea name="formacion" rows="2" class="form-control bg-dark text-light">{{ old('formacion', $perfil->formacion) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reconocimientos</label>
                        <textarea name="reconocimientos" rows="2" class="form-control bg-dark text-light">{{ old('reconocimientos', $perfil->reconocimientos) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Guardar Cambios
                </button>
                <a href="{{ route('mi-portafolio') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
