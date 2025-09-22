<!-- Modal para editar acentos y dialectos -->
<div class="modal fade" id="editAcentosDialectosModal" tabindex="-1" aria-labelledby="editAcentosDialectosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editAcentosDialectosLabel">Editar Acentos y Dialectos de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="{{ route('perfil-acento-dialecto.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach($acentos as $acento)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="acentos_dialectos[]" 
                                           value="{{ $acento->id }}"
                                           id="acento-{{ $acento->id }}"
                                           {{ in_array($acento->id, $acentosSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="acento-{{ $acento->id }}">
                                        {{ $acento->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Acentos/Dialectos</button>
                </div>
            </form>
        </div>
    </div>
</div>
