<!-- Modal para editar idiomas -->
<div class="modal fade" id="editIdiomasModal" tabindex="-1" aria-labelledby="editIdiomasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editIdiomasLabel">Editar Idiomas de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="{{ route('mi-portafolio.idiomas.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach($idiomas as $idioma)
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="idiomas[]" value="{{ $idioma->id }}"
                                    id="idioma-{{ $idioma->id }}"
                                    {{ in_array($idioma->id, $idiomasPerfil) ? 'checked' : '' }}>
                                <label class="form-check-label" for="idioma-{{ $idioma->id }}">
                                    {{ $idioma->nombre }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Idiomas</button>
                </div>
            </form>
        </div>
    </div>
</div>
