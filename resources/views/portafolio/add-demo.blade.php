<!-- Modal para agregar Demo -->
<div class="modal fade" id="addDemoModal" tabindex="-1" aria-labelledby="addDemoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="addDemoLabel">Agregar Demo para {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('demos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo (Audio o Video)</label>
                        <input type="file" name="archivo" id="archivo" class="form-control"
                            accept="audio/*,video/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_archivo" class="form-label">Tipo de archivo</label>
                        <select name="tipo_archivo" id="tipo_archivo" class="form-select" required>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="portada" class="form-label">Portada (opcional)</label>
                        <input type="file" name="portada" id="portada" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="idioma_id" class="form-label">Idioma</label>
                        <select name="idioma_id" id="idioma_id" class="form-select">
                            @foreach (\App\Models\Idioma::all() as $idioma)
                                <option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_voz_id" class="form-label">Tipo de Voz</label>
                        <select name="tipo_voz_id" id="tipo_voz_id" class="form-select">
                            @foreach (\App\Models\TipoVoz::all() as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="estilo_voz_id" class="form-label">Estilo de Voz</label>
                        <select name="estilo_voz_id" id="estilo_voz_id" class="form-select">
                            @foreach (\App\Models\EstilosVoz::all() as $estilo)
                                <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rango_vocal_id" class="form-label">Rango Vocal</label>
                        <select name="rango_vocal_id" id="rango_vocal_id" class="form-select">
                            @foreach (\App\Models\RangoVocal::all() as $rango)
                                <option value="{{ $rango->id }}">{{ $rango->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="timbre_voz_id" class="form-label">Timbre de Voz</label>
                        <select name="timbre_voz_id" id="timbre_voz_id" class="form-select">
                            @foreach (\App\Models\TimbreVoz::all() as $timbre)
                                <option value="{{ $timbre->id }}">{{ $timbre->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="acento_id" class="form-label">Acento / Dialecto</label>
                        <select name="acento_id" id="acento_id" class="form-select">
                            @foreach (\App\Models\AcentosDialecto::all() as $acento)
                                <option value="{{ $acento->id }}">{{ $acento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mt-2"> <input class="form-check-input" type="checkbox" name="visibilidad"
                            id="visibilidad" checked> <label class="form-check-label"
                            for="visibilidad">Público</label> </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
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
                    <button type="submit" class="btn btn-primary">Agregar Demo</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mensajes de sesión -->
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
