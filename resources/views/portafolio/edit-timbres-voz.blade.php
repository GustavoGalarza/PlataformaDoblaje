<!-- Modal para editar Timbres de Voz -->
<div class="modal fade" id="editTimbresVozModal" tabindex="-1" aria-labelledby="editTimbresVozLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editTimbresVozLabel">Editar Timbres de Voz de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="{{ route('perfil-timbre-voz.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach($timbres as $timbre)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="timbres[]" 
                                           value="{{ $timbre->id }}"
                                           id="timbre-{{ $timbre->id }}"
                                           {{ in_array($timbre->id, $timbresSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="timbre-{{ $timbre->id }}">
                                        {{ $timbre->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Timbres de Voz</button>
                </div>
            </form>
        </div>
    </div>
</div>
