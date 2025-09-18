<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- Usuario --}}
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Usuario') }}</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="">Selecciona el usuario propietario del perfil</option>
                @foreach ($usuarios as $id => $nombre)
                    <option value="{{ $id }}"
                        {{ old('user_id', $perfile?->user_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Nombre --}}
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $perfile?->nombre) }}" id="nombre"
                placeholder="Nombre completo- Ej. Juan Pérez Soliz">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Edad --}}
        <div class="form-group mb-2 mb20">
            <label for="edad" class="form-label">{{ __('Edad') }}</label>
            <input type="text" name="edad" class="form-control @error('edad') is-invalid @enderror"
                value="{{ old('edad', $perfile?->edad) }}" id="edad" placeholder="Edad actual">
            {!! $errors->first('edad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Email --}}
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $perfile?->email) }}" id="email" placeholder="Ej. juanperez@gmail.com">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Teléfono --}}
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                value="{{ old('telefono', $perfile?->telefono) }}" id="telefono" placeholder="Ej. +52 555 123 4567">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Biografía --}}
        <div class="form-group mb-2 mb20">
            <label for="biografia" class="form-label">{{ __('Biografía') }}</label>
            <textarea name="biografia" class="form-control @error('biografia') is-invalid @enderror" id="biografia"
                placeholder="Cuenta un poco sobre ti, tu experiencia y trayectoria">{{ old('biografia', $perfile?->biografia) }}</textarea>
            {!! $errors->first('biografia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Ubicación --}}
        <div class="form-group mb-2 mb20">
            <label for="ubicacion" class="form-label">{{ __('Ubicación') }}</label>
            <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                value="{{ old('ubicacion', $perfile?->ubicacion) }}" id="ubicacion"
                placeholder="Ej. Ciudad de México, México">
            {!! $errors->first('ubicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Disponibilidad --}}
        <div class="form-group mb-2 mb20">
            <label for="disponibilidad" class="form-label">{{ __('Disponibilidad') }}</label>
            <input type="text" name="disponibilidad"
                class="form-control @error('disponibilidad') is-invalid @enderror"
                value="{{ old('disponibilidad', $perfile?->disponibilidad) }}" id="disponibilidad"
                placeholder="Ej. Disponible de lunes a viernes, horario flexible">
            {!! $errors->first(
                'disponibilidad',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        {{-- Habilidades --}}
        @foreach ([
        'diccion_articulacion' => 'Describe tu nivel de claridad al hablar',
        'actuacion_emociones' => 'Ej. Capacidad de transmitir alegría, tristeza, sorpresa...',
        'advertencia_vocal' => 'Problemas vocales. Ej. Evitar registros muy agudos o graves, limitaciones vocales',
        'home_studio' => '¿Tienes facilidad de Home studio? Ej. Micrófono Rode NT1-A, interfaz Focusrite Scarlett, cabina tratada acústicamente',
        'edicion_postproduccion' => '¿Capacidad tecnicas en produccion? Ej. Adobe Audition, Pro Tools, nivel intermedio',
        'entregas_flujo_trabajo' => 'Ej. Entregas en 24h, revisiones ilimitadas, formatos WAV/MP3',
        'creditos' => 'Ej. Comerciales para Radio XYZ, doblaje en Netflix, locución institucional, Personajes doblados',
        'formacion' => 'Ej. Curso de doblaje con Mario Castañeda, Licenciatura en Comunicación, talleres u masterclass completados',
        'reconocimientos' => 'Ej. Premio Voz Revelación 2022, finalista en concurso de doblaje, premios por participacion',
    ] as $campo => $placeholder)
            <div class="form-group mb-2 mb20">
                <label for="{{ $campo }}"
                    class="form-label">{{ __(ucwords(str_replace('_', ' ', $campo))) }}</label>
                <textarea name="{{ $campo }}" class="form-control @error($campo) is-invalid @enderror" id="{{ $campo }}"
                    placeholder="{{ $placeholder }}">{{ old($campo, $perfile?->$campo) }}</textarea>
                {!! $errors->first($campo, '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        @endforeach

        {{-- Foto (Cloudinary) --}}
        <div class="form-group mb-2 mb20">
            <label for="foto_url" class="form-label">{{ __('Foto de perfil') }}</label>
            <input type="file" name="foto_url" class="form-control @error('foto_url') is-invalid @enderror"
                id="foto_url" placeholder="Sube tu mejor foto profesional">
            {!! $errors->first('foto_url', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

            @if ($perfile?->foto_url)
                <x-cloudinary::image public-id="{{ $perfile->foto_url }}" width="200" height="150"
                    crop="fit" />
            @else
                <span class="badge bg-secondary">No hay imagen</span>
            @endif
        </div>

        {{-- Estado --}}
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                <option value="activo" {{ old('estado', $perfile?->estado) == 'activo' ? 'selected' : '' }}>Activo
                </option>
                <option value="inactivo" {{ old('estado', $perfile?->estado) == 'inactivo' ? 'selected' : '' }}>
                    Inactivo</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
