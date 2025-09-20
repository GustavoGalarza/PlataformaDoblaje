<!-- Modal para editar Tipos de Voz -->
<div class="modal fade" id="editTiposVozModal" tabindex="-1" aria-labelledby="editTiposVozLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editTiposVozLabel">Editar Tipos de Voz de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('perfil-tipo-voz.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        @foreach ($tiposVoz as $tipo)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tipos_voz[]"
                                        value="{{ $tipo->id }}" id="tipo-voz-{{ $tipo->id }}"
                                        {{ in_array($tipo->id, $tiposSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tipo-voz-{{ $tipo->id }}">
                                        {{ $tipo->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Tipos de Voz</button>
                </div>
            </form>
        </div>
    </div>
</div>
