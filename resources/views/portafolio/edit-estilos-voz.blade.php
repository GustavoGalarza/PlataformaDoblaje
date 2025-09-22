<!-- Modal para editar estilos de voz -->
<div class="modal fade" id="editEstilosVozModal" tabindex="-1" aria-labelledby="editEstilosVozLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editEstilosVozLabel">Editar Estilos de Voz de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="{{ route('perfil-estilos-voz.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach($estilosVoz as $estilo)
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="estilos_voz[]" value="{{ $estilo->id }}"
                                    id="estilo-{{ $estilo->id }}"
                                    {{ in_array($estilo->id, $estilosSeleccionados) ? 'checked' : '' }}>
                                <label class="form-check-label" for="estilo-{{ $estilo->id }}">
                                    {{ $estilo->nombre }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Estilos</button>
                </div>
            </form>
        </div>
    </div>
</div>
