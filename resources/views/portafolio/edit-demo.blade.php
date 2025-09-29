<!-- Modal para editar Demo -->
<div class="modal fade" id="editDemoModal-{{ $demo->id_demo }}" tabindex="-1" aria-labelledby="editDemoLabel-{{ $demo->id_demo }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editDemoLabel-{{ $demo->id_demo }}">Editar Demo: {{ $demo->titulo }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('demos.update', [$perfil->id_perfil, $demo->id_demo]) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="archivo-{{ $demo->id_demo }}" class="form-label">Archivo (Audio/Video)</label>
                        <input type="file" name="archivo" id="archivo-{{ $demo->id_demo }}" class="form-control" accept="audio/*,video/*">
                        <small class="text-muted">Si subes un nuevo archivo, reemplazará el anterior.</small>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_archivo-{{ $demo->id_demo }}" class="form-label">Tipo de archivo</label>
                        <select name="tipo_archivo" id="tipo_archivo-{{ $demo->id_demo }}" class="form-select" required>
                            <option value="audio" {{ $demo->tipo_archivo == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="video" {{ $demo->tipo_archivo == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    <!-- Relaciones -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="idioma_id-{{ $demo->id_demo }}" class="form-label">Idioma</label>
                            <select name="idioma_id" id="idioma_id-{{ $demo->id_demo }}" class="form-select">
                                @foreach(\App\Models\Idioma::all() as $idioma)
                                    <option value="{{ $idioma->id }}" {{ $demo->idioma_id == $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Repite para tipo_voz, estilo_voz, rango_vocal, timbre_color_voz, acento -->
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="visibilidad" id="visibilidad-{{ $demo->id_demo }}" {{ $demo->visibilidad ? 'checked' : '' }}>
                        <label class="form-check-label" for="visibilidad-{{ $demo->id_demo }}">Público</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Demo</button>
                </div>
            </form>
        </div>
    </div>
</div>
