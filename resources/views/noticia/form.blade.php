<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Usuario -->
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($usuarios as $id => $name)
                    <option value="{{ $id }}"
                        {{ old('user_id', $noticia?->user_id) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- Titulo -->
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                value="{{ old('titulo', $noticia?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- contenido -->
        <div class="form-group mb-2 mb20">
            <label for="contenido" class="form-label">{{ __('Contenido') }}</label>
            <input type="text" name="contenido" class="form-control @error('contenido') is-invalid @enderror"
                value="{{ old('contenido', $noticia?->contenido) }}" id="contenido" placeholder="Contenido">
            {!! $errors->first('contenido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- Tipo de Publicación -->
        <div class="form-group mb-2 mb20">
            <label for="tipo_publicacion" class="form-label">Tipo de Publicación</label>
            @php
                $tipos = [
                    'taller' => 'Taller',
                    'masterclass' => 'Masterclass',
                    'webinar' => 'Webinar',
                    'evento' => 'Evento',
                    'anuncio' => 'Anuncio',
                ];
            @endphp
            <select name="tipo_publicacion" id="tipo_publicacion" class="form-control">
                @foreach ($tipos as $value => $label)
                    <option value="{{ $value }}"
                        {{ old('tipo_publicacion', $noticia?->tipo_publicacion) == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first(
                'tipo_publicacion',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <!-- Archivo url -->
        <div class="form-group mb-2 mb20">
            <label for="archivo_url" class="form-label">{{ __('Imagen de la noticia') }}</label>
            <input type="file" name="archivo_url" class="form-control @error('archivo_url') is-invalid @enderror"
                id="archivo_url" accept="image/*">
            {!! $errors->first('archivo_url', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Fecha Publicación -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_publicacion" class="form-label">{{ __('Fecha Publicacion') }}</label>
            <input type="text" name="fecha_publicacion"
                class="form-control @error('fecha_publicacion') is-invalid @enderror"
                value="{{ old('fecha_publicacion', $noticia?->fecha_publicacion) }}" id="fecha_publicacion"
                placeholder="Fecha Publicacion">
            {!! $errors->first(
                'fecha_publicacion',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <!-- fecha del evento -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_evento" class="form-label">{{ __('Fecha Evento') }}</label>
            <input type="text" name="fecha_evento" class="form-control @error('fecha_evento') is-invalid @enderror"
                value="{{ old('fecha_evento', $noticia?->fecha_evento) }}" id="fecha_evento"
                placeholder="Fecha Evento">
            {!! $errors->first('fecha_evento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- Lugar -->
        <div class="form-group mb-2 mb20">
            <label for="lugar" class="form-label">{{ __('Lugar') }}</label>
            <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror"
                value="{{ old('lugar', $noticia?->lugar) }}" id="lugar" placeholder="Lugar">
            {!! $errors->first('lugar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- enlace de transmision -->
        <div class="form-group mb-2 mb20">
            <label for="enlace_transmision" class="form-label">{{ __('Enlace Transmision') }}</label>
            <input type="text" name="enlace_transmision"
                class="form-control @error('enlace_transmision') is-invalid @enderror"
                value="{{ old('enlace_transmision', $noticia?->enlace_transmision) }}" id="enlace_transmision"
                placeholder="Enlace Transmision">
            {!! $errors->first(
                'enlace_transmision',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <!-- Requiere inscripción -->
        <div class="form-group mb-2 mb20">
            <label for="requiere_inscripcion" class="form-label">Requiere inscripción</label>
            <select name="requiere_inscripcion" id="requiere_inscripcion" class="form-control">
                <option value="0"
                    {{ old('requiere_inscripcion', $noticia?->requiere_inscripcion) == 0 ? 'selected' : '' }}>No
                </option>
                <option value="1"
                    {{ old('requiere_inscripcion', $noticia?->requiere_inscripcion) == 1 ? 'selected' : '' }}>Sí
                </option>
            </select>
        </div>

        <!-- Certificado -->
        <div class="form-group mb-2 mb20">
            <label for="certificado" class="form-label">Certificado</label>
            <select name="certificado" id="certificado" class="form-control">
                <option value="0" {{ old('certificado', $noticia?->certificado) == 0 ? 'selected' : '' }}>No
                </option>
                <option value="1" {{ old('certificado', $noticia?->certificado) == 1 ? 'selected' : '' }}>Sí
                </option>
            </select>
        </div>
        <!-- Estado -->
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">Estado</label>
            @php
                $estados = [
                    'no_iniciado' => 'No iniciado',
                    'en_curso' => 'En curso',
                    'finalizado' => 'Finalizado',
                ];
            @endphp
            <select name="estado" id="estado" class="form-control">
                @foreach ($estados as $value => $label)
                    <option value="{{ $value }}"
                        {{ old('estado', $noticia?->estado) == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
