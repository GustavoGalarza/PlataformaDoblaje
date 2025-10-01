<!-- Modal para editar Demo -->
<div class="modal fade" id="editDemoModal-{{ $demo->id_demo }}" tabindex="-1" aria-labelledby="editDemoLabel-{{ $demo->id_demo }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editDemoLabel-{{ $demo->id_demo }}">Editar Demo: {{ $demo->titulo }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('demos.update', $demo->id_demo) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo-{{ $demo->id_demo }}" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo-{{ $demo->id_demo }}" class="form-control" value="{{ $demo->titulo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion-{{ $demo->id_demo }}" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion-{{ $demo->id_demo }}" class="form-control" rows="3">{{ $demo->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_archivo-{{ $demo->id_demo }}" class="form-label">Tipo de archivo</label>
                        <select name="tipo_archivo" id="tipo_archivo-{{ $demo->id_demo }}" class="form-select" required>
                            <option value="audio" {{ $demo->tipo_archivo == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="video" {{ $demo->tipo_archivo == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="archivo-{{ $demo->id_demo }}" class="form-label">Archivo (opcional)</label>
                        <input type="file" name="archivo" id="archivo-{{ $demo->id_demo }}" class="form-control" accept="audio/*,video/*">
                        <small class="text-muted">Sube solo si quieres reemplazar el archivo actual</small>
                    </div>

                    <div class="mb-3">
                        <label for="portada-{{ $demo->id_demo }}" class="form-label">Portada (opcional)</label>
                        <input type="file" name="portada" id="portada-{{ $demo->id_demo }}" class="form-control" accept="image/*">
                        <small class="text-muted">Sube solo si quieres reemplazar la portada actual</small>
                    </div>

                    {{-- Selecciones de idioma, tipo voz, estilo, rango, timbre, acento --}}
                    <div class="mb-3">
                        <label for="idioma_id-{{ $demo->id_demo }}" class="form-label">Idioma</label>
                        <select name="idioma_id" id="idioma_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\Idioma::all() as $idioma)
                                <option value="{{ $idioma->id }}" {{ $demo->idioma_id == $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_voz_id-{{ $demo->id_demo }}" class="form-label">Tipo de Voz</label>
                        <select name="tipo_voz_id" id="tipo_voz_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\TipoVoz::all() as $tipo)
                                <option value="{{ $tipo->id }}" {{ $demo->tipo_voz_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="estilo_voz_id-{{ $demo->id_demo }}" class="form-label">Estilo de Voz</label>
                        <select name="estilo_voz_id" id="estilo_voz_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\EstilosVoz::all() as $estilo)
                                <option value="{{ $estilo->id }}" {{ $demo->estilo_voz_id == $estilo->id ? 'selected' : '' }}>{{ $estilo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rango_vocal_id-{{ $demo->id_demo }}" class="form-label">Rango Vocal</label>
                        <select name="rango_vocal_id" id="rango_vocal_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\RangoVocal::all() as $rango)
                                <option value="{{ $rango->id }}" {{ $demo->rango_vocal_id == $rango->id ? 'selected' : '' }}>{{ $rango->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="timbre_voz_id-{{ $demo->id_demo }}" class="form-label">Timbre de Voz</label>
                        <select name="timbre_voz_id" id="timbre_voz_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\TimbreVoz::all() as $timbre)
                                <option value="{{ $timbre->id }}" {{ $demo->timbre_voz_id == $timbre->id ? 'selected' : '' }}>{{ $timbre->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="acento_id-{{ $demo->id_demo }}" class="form-label">Acento / Dialecto</label>
                        <select name="acento_id" id="acento_id-{{ $demo->id_demo }}" class="form-select">
                            <option value="">-- Selecciona --</option>
                            @foreach (\App\Models\AcentosDialecto::all() as $acento)
                                <option value="{{ $acento->id }}" {{ $demo->acento_id == $acento->id ? 'selected' : '' }}>{{ $acento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="visibilidad" id="visibilidad-{{ $demo->id_demo }}" {{ $demo->visibilidad ? 'checked' : '' }}> Visibilidad
                        <label class="form-check-label" for="visibilidad-{{ $demo->id_demo }}">/Público</label>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Demo</button>
                </div>
            </form>
        </div>
    </div>
</div>
